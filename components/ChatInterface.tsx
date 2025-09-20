import { useState, useEffect } from "react";
import { Button } from "./ui/button";
import { Input } from "./ui/input";
import { Card, CardContent } from "./ui/card";
import { ScrollArea } from "./ui/scroll-area";
import { Badge } from "./ui/badge";
import { Separator } from "./ui/separator";
import {
  PlaneTakeoffIcon,
  SendIcon,
  UsersIcon,
  CalendarIcon,
  MapPinIcon,
} from "lucide-react";
import { Flight } from "./FlightCard";
import { generateMockFlights } from "../utils/mockFlights";

interface ChatMessage {
  id: string;
  type: "user" | "assistant" | "flight-results";
  content: string;
  flights?: Flight[];
  searchParams?: {
    from: string;
    to: string;
    date: string;
    passengers: number;
    isGroup?: boolean;
  };
}

interface ChatInterfaceProps {
  onFlightSelect: (flight: Flight) => void;
}

export function ChatInterface({
  onFlightSelect,
}: ChatInterfaceProps) {
  const [messages, setMessages] = useState<ChatMessage[]>([
    {
      id: "1",
      type: "assistant",
      content:
        '✈️ Hi! I\'m your AI travel assistant from Book Me Memories. I can help you find flights and create unforgettable travel experiences, including group bookings for 10+ passengers. Just tell me where you\'d like to go!\n\nTry saying something like:\n• "Find flights from New York to London"\n• "Group booking for 15 people to Paris"\n• "Cheapest flights to Tokyo next week"',
    },
  ]);
  const [inputValue, setInputValue] = useState("");
  const [isLoading, setIsLoading] = useState(false);

  const scrollToBottom = () => {
    // Use a timeout to ensure the DOM has updated
    setTimeout(() => {
      const scrollArea = document.querySelector(
        "[data-radix-scroll-area-viewport]",
      );
      if (scrollArea) {
        scrollArea.scrollTop = scrollArea.scrollHeight;
      }
    }, 100);
  };

  useEffect(() => {
    scrollToBottom();
  }, [messages]);

  const parseFlightRequest = (message: string) => {
    const lowerMessage = message.toLowerCase();

    // Extract locations
    const fromMatch = lowerMessage.match(
      /from\s+([a-zA-Z\s]+?)(?:\s+to|\s+→)/,
    );
    const toMatch = lowerMessage.match(
      /to\s+([a-zA-Z\s]+?)(?:\s|$|on|next|in)/,
    );

    // Extract passenger count and group booking
    const groupMatch = lowerMessage.match(
      /group|(\d+)\s*people|(\d+)\s*passengers/,
    );
    const passengerMatch = lowerMessage.match(
      /(\d+)\s*(?:people|passengers|pax)/,
    );

    let passengers = 1;
    let isGroup = false;

    if (groupMatch) {
      isGroup = true;
      if (passengerMatch) {
        passengers = parseInt(passengerMatch[1]);
      } else {
        passengers = 12; // Default group size
      }
    } else if (passengerMatch) {
      passengers = parseInt(passengerMatch[1]);
      isGroup = passengers >= 10;
    }

    // Extract dates
    let date = new Date();
    date.setDate(date.getDate() + 7); // Default to next week

    if (lowerMessage.includes("today")) {
      date = new Date();
    } else if (lowerMessage.includes("tomorrow")) {
      date = new Date();
      date.setDate(date.getDate() + 1);
    } else if (lowerMessage.includes("next week")) {
      date = new Date();
      date.setDate(date.getDate() + 7);
    }

    return {
      from: fromMatch ? fromMatch[1].trim() : "",
      to: toMatch ? toMatch[1].trim() : "",
      date: date.toISOString().split("T")[0],
      passengers,
      isGroup,
    };
  };

  const generateResponse = (
    userMessage: string,
  ): ChatMessage[] => {
    const searchParams = parseFlightRequest(userMessage);

    if (searchParams.from && searchParams.to) {
      const flights = generateMockFlights(
        searchParams.from,
        searchParams.to,
      );

      // Apply group pricing if applicable
      const processedFlights = flights.map((flight) => ({
        ...flight,
        price: searchParams.isGroup
          ? Math.round(flight.price * 0.85)
          : flight.price, // 15% group discount
      }));

      const responseMessage = searchParams.isGroup
        ? `🎉 Great! I found group flights for ${searchParams.passengers} passengers from ${searchParams.from} to ${searchParams.to}. Group bookings (10+ passengers) get 15% off regular prices!`
        : `✈️ Found flights from ${searchParams.from} to ${searchParams.to} for ${searchParams.passengers} passenger${searchParams.passengers > 1 ? "s" : ""}.`;

      return [
        {
          id: Date.now().toString(),
          type: "assistant",
          content: responseMessage,
        },
        {
          id: (Date.now() + 1).toString(),
          type: "flight-results",
          content: "",
          flights: processedFlights.slice(0, 6), // Show top 6 results
          searchParams,
        },
      ];
    }

    // Handle other queries
    if (userMessage.toLowerCase().includes("group")) {
      return [
        {
          id: Date.now().toString(),
          type: "assistant",
          content:
            "🏢 For group bookings (10+ passengers), I can offer:\n\n• 15% discount on regular fares\n• Flexible payment terms\n• Dedicated group coordinator\n• Special meal arrangements\n• Seat block reservations\n\nJust tell me your departure city, destination, and group size!",
        },
      ];
    }

    if (userMessage.toLowerCase().includes("help")) {
      return [
        {
          id: Date.now().toString(),
          type: "assistant",
          content:
            '🤖 I can help you with:\n\n✈️ **Flight Search**: "Find flights from NYC to London"\n👥 **Group Bookings**: "Group booking for 20 people to Paris"\n💰 **Best Deals**: "Cheapest flights to Tokyo"\n📅 **Flexible Dates**: "Flights to Rome next month"\n\nJust describe what you\'re looking for in natural language!',
        },
      ];
    }

    return [
      {
        id: Date.now().toString(),
        type: "assistant",
        content:
          'I\'d be happy to help you find flights! Please tell me:\n\n📍 Where are you flying from?\n📍 Where would you like to go?\n👥 How many passengers?\n\nFor example: "Find flights from New York to London for 2 passengers"',
      },
    ];
  };

  const handleSendMessage = async () => {
    if (!inputValue.trim()) return;

    const userMessage: ChatMessage = {
      id: Date.now().toString(),
      type: "user",
      content: inputValue,
    };

    setMessages((prev) => [...prev, userMessage]);
    setInputValue("");
    setIsLoading(true);

    // Simulate API delay
    setTimeout(() => {
      const responses = generateResponse(userMessage.content);
      setMessages((prev) => [...prev, ...responses]);
      setIsLoading(false);
    }, 1000);
  };

  const handleKeyPress = (e: React.KeyboardEvent) => {
    if (e.key === "Enter" && !e.shiftKey) {
      e.preventDefault();
      handleSendMessage();
    }
  };

  const formatPrice = (price: number, isGroup: boolean) => {
    return isGroup ? (
      <div className="text-right">
        <div className="line-through text-muted-foreground text-sm">
          ${Math.round(price / 0.85)}
        </div>
        <div className="text-green-600 dark:text-green-400">
          ${price}
        </div>
        <div className="text-xs text-green-600 dark:text-green-400">
          Group Rate
        </div>
      </div>
    ) : (
      <div>${price}</div>
    );
  };

  return (
    <div className="flex flex-col h-[80vh] max-w-4xl mx-auto">
      <ScrollArea className="flex-1 px-4">
        <div className="space-y-6 py-4">
          {messages.map((message) => (
            <div key={message.id}>
              {message.type === "user" ? (
                <div className="flex justify-end">
                  <div className="bg-primary text-primary-foreground px-4 py-3 rounded-lg max-w-[80%]">
                    {message.content}
                  </div>
                </div>
              ) : message.type === "assistant" ? (
                <div className="flex justify-start">
                  <div className="bg-muted px-4 py-3 rounded-lg max-w-[80%] whitespace-pre-line">
                    {message.content}
                  </div>
                </div>
              ) : (
                <div className="w-full">
                  <Card>
                    <CardContent className="p-4">
                      <div className="flex items-center gap-2 mb-4">
                        <PlaneTakeoffIcon className="w-5 h-5 text-primary" />
                        <span>Flight Results</span>
                        {message.searchParams?.isGroup && (
                          <Badge
                            variant="secondary"
                            className="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100"
                          >
                            <UsersIcon className="w-3 h-3 mr-1" />
                            Group Booking
                          </Badge>
                        )}
                      </div>

                      <div className="space-y-3">
                        {message.flights?.map(
                          (flight, index) => (
                            <div
                              key={flight.id}
                              className="border rounded-lg p-4 hover:bg-muted/50 transition-colors"
                            >
                              <div className="flex items-center justify-between mb-2">
                                <div className="flex items-center gap-2">
                                  <span className="font-medium">
                                    {flight.airline}
                                  </span>
                                  <Badge variant="outline">
                                    {flight.flightNumber}
                                  </Badge>
                                </div>
                                <Badge
                                  className={
                                    flight.stops === 0
                                      ? "bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100"
                                      : ""
                                  }
                                >
                                  {flight.stops === 0
                                    ? "Direct"
                                    : `${flight.stops} stop${flight.stops > 1 ? "s" : ""}`}
                                </Badge>
                              </div>

                              <div className="flex items-center justify-between">
                                <div className="flex items-center gap-8">
                                  <div className="text-center">
                                    <div className="font-mono text-lg">
                                      {flight.departure.time}
                                    </div>
                                    <div className="text-sm text-muted-foreground">
                                      {flight.departure.city}
                                    </div>
                                  </div>
                                  <div className="text-center">
                                    <div className="text-sm text-muted-foreground">
                                      {flight.duration}
                                    </div>
                                    <div className="h-px bg-border w-16"></div>
                                  </div>
                                  <div className="text-center">
                                    <div className="font-mono text-lg">
                                      {flight.arrival.time}
                                    </div>
                                    <div className="text-sm text-muted-foreground">
                                      {flight.arrival.city}
                                    </div>
                                  </div>
                                </div>

                                <div className="flex items-center gap-4">
                                  {formatPrice(
                                    flight.price,
                                    message.searchParams
                                      ?.isGroup || false,
                                  )}
                                  <Button
                                    size="sm"
                                    onClick={() =>
                                      onFlightSelect(flight)
                                    }
                                  >
                                    Select
                                  </Button>
                                </div>
                              </div>
                            </div>
                          ),
                        )}
                      </div>
                    </CardContent>
                  </Card>
                </div>
              )}
            </div>
          ))}

          {isLoading && (
            <div className="flex justify-start">
              <div className="bg-muted px-4 py-3 rounded-lg">
                <div className="flex items-center gap-2">
                  <div className="w-2 h-2 bg-primary rounded-full animate-bounce"></div>
                  <div
                    className="w-2 h-2 bg-primary rounded-full animate-bounce"
                    style={{ animationDelay: "0.1s" }}
                  ></div>
                  <div
                    className="w-2 h-2 bg-primary rounded-full animate-bounce"
                    style={{ animationDelay: "0.2s" }}
                  ></div>
                </div>
              </div>
            </div>
          )}
        </div>
      </ScrollArea>

      <div className="p-4 border-t bg-background">
        <div className="flex gap-2">
          <Input
            placeholder="Ask me about flights... (e.g., 'Find group flights from NYC to London for 15 people')"
            value={inputValue}
            onChange={(e) => setInputValue(e.target.value)}
            onKeyPress={handleKeyPress}
            className="flex-1"
            disabled={isLoading}
          />
          <Button
            onClick={handleSendMessage}
            disabled={!inputValue.trim() || isLoading}
            size="icon"
          >
            <SendIcon className="w-4 h-4" />
          </Button>
        </div>

        <div className="flex flex-wrap gap-2 mt-3">
          {[
            "Find flights from New York to London",
            "Group booking for 20 people to Paris",
            "Cheapest flights to Tokyo",
            "Business class to Dubai",
          ].map((suggestion) => (
            <Button
              key={suggestion}
              variant="outline"
              size="sm"
              onClick={() => setInputValue(suggestion)}
              className="text-xs"
            >
              {suggestion}
            </Button>
          ))}
        </div>
      </div>
    </div>
  );
}