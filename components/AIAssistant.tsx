import { useState } from 'react';
import { Card, CardContent, CardHeader, CardTitle } from './ui/card';
import { Button } from './ui/button';
import { Input } from './ui/input';
import { ScrollArea } from './ui/scroll-area';
import { Badge } from './ui/badge';
import { BotIcon, SendIcon, UserIcon, SparklesIcon } from 'lucide-react';
import type { Flight } from './FlightCard';

interface Message {
  id: string;
  type: 'user' | 'assistant';
  content: string;
  suggestions?: string[];
}

interface AIAssistantProps {
  flights: Flight[];
  onSuggestion: (suggestion: string) => void;
}

export function AIAssistant({ flights, onSuggestion }: AIAssistantProps) {
  const [messages, setMessages] = useState<Message[]>([
    {
      id: '1',
      type: 'assistant',
      content: "Hi! I'm your AI flight assistant. I can help you find the best flights based on your preferences. What are you looking for?",
      suggestions: [
        "Show me the cheapest flights",
        "Find direct flights only",
        "What's the shortest flight time?",
        "Recommend flights with good amenities"
      ]
    }
  ]);
  const [inputValue, setInputValue] = useState('');

  const generateResponse = (userMessage: string): Message => {
    const lowerMessage = userMessage.toLowerCase();
    
    if (lowerMessage.includes('cheap') || lowerMessage.includes('budget') || lowerMessage.includes('price')) {
      const cheapestFlight = flights.reduce((min, flight) => flight.price < min.price ? flight : min, flights[0]);
      return {
        id: Date.now().toString(),
        type: 'assistant',
        content: `The cheapest flight I found is ${cheapestFlight?.airline} ${cheapestFlight?.flightNumber} for $${cheapestFlight?.price}. It departs at ${cheapestFlight?.departure.time} with ${cheapestFlight?.stops === 0 ? 'no stops' : `${cheapestFlight?.stops} stop(s)`}.`,
        suggestions: [
          "Show me more budget options",
          "What about premium economy?",
          "Find flights under $500"
        ]
      };
    }
    
    if (lowerMessage.includes('direct') || lowerMessage.includes('nonstop')) {
      const directFlights = flights.filter(f => f.stops === 0);
      return {
        id: Date.now().toString(),
        type: 'assistant',
        content: `I found ${directFlights.length} direct flights. The best option is ${directFlights[0]?.airline} for $${directFlights[0]?.price}, departing at ${directFlights[0]?.departure.time}.`,
        suggestions: [
          "Show all direct flights",
          "Compare with connecting flights",
          "What's the fastest direct flight?"
        ]
      };
    }
    
    if (lowerMessage.includes('fast') || lowerMessage.includes('quick') || lowerMessage.includes('shortest')) {
      const fastestFlight = flights.reduce((min, flight) => flight.duration < min.duration ? flight : min, flights[0]);
      return {
        id: Date.now().toString(),
        type: 'assistant',
        content: `The shortest flight is ${fastestFlight?.duration} with ${fastestFlight?.airline} ${fastestFlight?.flightNumber} for $${fastestFlight?.price}.`,
        suggestions: [
          "Show more quick flights",
          "What about layover times?",
          "Find flights under 3 hours"
        ]
      };
    }
    
    if (lowerMessage.includes('amenities') || lowerMessage.includes('wifi') || lowerMessage.includes('meals')) {
      const amenityFlights = flights.filter(f => f.amenities.length > 0);
      const bestAmenities = amenityFlights.reduce((best, flight) => 
        flight.amenities.length > best.amenities.length ? flight : best, amenityFlights[0]
      );
      return {
        id: Date.now().toString(),
        type: 'assistant',
        content: `${bestAmenities?.airline} offers great amenities including ${bestAmenities?.amenities.join(', ')}. This flight costs $${bestAmenities?.price} and takes ${bestAmenities?.duration}.`,
        suggestions: [
          "Show flights with WiFi",
          "Find flights with meals included",
          "What about entertainment options?"
        ]
      };
    }

    if (lowerMessage.includes('business') || lowerMessage.includes('first') || lowerMessage.includes('premium')) {
      const premiumFlights = flights.filter(f => f.class === 'business' || f.class === 'first' || f.class === 'premium');
      return {
        id: Date.now().toString(),
        type: 'assistant',
        content: `I found ${premiumFlights.length} premium flights. The best value is ${premiumFlights[0]?.airline} in ${premiumFlights[0]?.class} class for $${premiumFlights[0]?.price}.`,
        suggestions: [
          "Compare business vs first class",
          "Show premium economy options",
          "What are the upgrade costs?"
        ]
      };
    }
    
    // Default response
    return {
      id: Date.now().toString(),
      type: 'assistant',
      content: "I can help you find flights based on price, duration, amenities, or class. What's most important to you for this trip?",
      suggestions: [
        "Find the cheapest option",
        "Show direct flights only",
        "What's included in business class?",
        "Compare airlines"
      ]
    };
  };

  const handleSendMessage = () => {
    if (!inputValue.trim()) return;

    const userMessage: Message = {
      id: Date.now().toString(),
      type: 'user',
      content: inputValue
    };

    const assistantResponse = generateResponse(inputValue);

    setMessages(prev => [...prev, userMessage, assistantResponse]);
    setInputValue('');
  };

  const handleKeyPress = (e: React.KeyboardEvent) => {
    if (e.key === 'Enter') {
      handleSendMessage();
    }
  };

  return (
    <Card className="h-[600px] flex flex-col">
      <CardHeader className="pb-4">
        <CardTitle className="flex items-center gap-2">
          <SparklesIcon className="w-5 h-5 text-primary" />
          AI Flight Assistant
        </CardTitle>
      </CardHeader>
      
      <CardContent className="flex-1 flex flex-col p-0">
        <ScrollArea className="flex-1 p-4">
          <div className="space-y-4">
            {messages.map((message) => (
              <div key={message.id} className={`flex gap-3 ${message.type === 'user' ? 'justify-end' : 'justify-start'}`}>
                {message.type === 'assistant' && (
                  <div className="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                    <BotIcon className="w-4 h-4 text-primary" />
                  </div>
                )}
                
                <div className={`max-w-[80%] ${message.type === 'user' ? 'order-first' : ''}`}>
                  <div className={`p-3 rounded-lg ${
                    message.type === 'user' 
                      ? 'bg-primary text-primary-foreground ml-auto' 
                      : 'bg-muted'
                  }`}>
                    <p>{message.content}</p>
                  </div>
                  
                  {message.suggestions && (
                    <div className="mt-2 flex flex-wrap gap-2">
                      {message.suggestions.map((suggestion, index) => (
                        <Button
                          key={index}
                          variant="outline"
                          size="sm"
                          onClick={() => onSuggestion(suggestion)}
                          className="text-xs"
                        >
                          {suggestion}
                        </Button>
                      ))}
                    </div>
                  )}
                </div>
                
                {message.type === 'user' && (
                  <div className="w-8 h-8 bg-secondary rounded-full flex items-center justify-center flex-shrink-0">
                    <UserIcon className="w-4 h-4" />
                  </div>
                )}
              </div>
            ))}
          </div>
        </ScrollArea>
        
        <div className="p-4 border-t">
          <div className="flex gap-2">
            <Input
              placeholder="Ask me about flights..."
              value={inputValue}
              onChange={(e) => setInputValue(e.target.value)}
              onKeyPress={handleKeyPress}
              className="flex-1"
            />
            <Button onClick={handleSendMessage} disabled={!inputValue.trim()}>
              <SendIcon className="w-4 h-4" />
            </Button>
          </div>
        </div>
      </CardContent>
    </Card>
  );
}