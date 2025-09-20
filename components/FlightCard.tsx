import { Card, CardContent } from './ui/card';
import { Button } from './ui/button';
import { Badge } from './ui/badge';
import { ClockIcon, PlaneIcon, WifiIcon, UtensilsIcon } from 'lucide-react';

export interface Flight {
  id: string;
  airline: string;
  flightNumber: string;
  departure: {
    city: string;
    airport: string;
    time: string;
  };
  arrival: {
    city: string;
    airport: string;
    time: string;
  };
  duration: string;
  price: number;
  stops: number;
  aircraft: string;
  amenities: string[];
  seatsLeft: number;
  class: 'economy' | 'premium' | 'business' | 'first';
}

interface FlightCardProps {
  flight: Flight;
  onSelect: (flight: Flight) => void;
}

export function FlightCard({ flight, onSelect }: FlightCardProps) {
  const formatTime = (timeString: string) => {
    return new Date(`2000-01-01T${timeString}`).toLocaleTimeString([], {
      hour: '2-digit',
      minute: '2-digit'
    });
  };

  const getClassColor = (flightClass: string) => {
    switch (flightClass) {
      case 'first': return 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-100';
      case 'business': return 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-100';
      case 'premium': return 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100';
      default: return 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100';
    }
  };

  return (
    <Card className="hover:shadow-md transition-shadow">
      <CardContent className="p-6">
        <div className="flex items-center justify-between mb-4">
          <div className="flex items-center gap-3">
            <div className="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
              <PlaneIcon className="w-4 h-4 text-primary" />
            </div>
            <div>
              <p className="font-medium">{flight.airline}</p>
              <p className="text-sm text-muted-foreground">{flight.flightNumber} • {flight.aircraft}</p>
            </div>
          </div>
          <Badge className={getClassColor(flight.class)}>
            {flight.class.charAt(0).toUpperCase() + flight.class.slice(1)}
          </Badge>
        </div>

        <div className="flex items-center justify-between mb-4">
          <div className="flex-1">
            <div className="flex items-center justify-between">
              <div className="text-center">
                <p className="text-2xl font-mono">{formatTime(flight.departure.time)}</p>
                <p className="text-sm text-muted-foreground">{flight.departure.airport}</p>
                <p className="text-sm">{flight.departure.city}</p>
              </div>

              <div className="flex-1 px-4">
                <div className="flex items-center justify-center relative">
                  <div className="h-px bg-border flex-1"></div>
                  <div className="mx-2 text-center">
                    <ClockIcon className="w-4 h-4 mx-auto mb-1 text-muted-foreground" />
                    <p className="text-sm text-muted-foreground">{flight.duration}</p>
                    {flight.stops > 0 && (
                      <p className="text-xs text-muted-foreground">
                        {flight.stops} stop{flight.stops > 1 ? 's' : ''}
                      </p>
                    )}
                  </div>
                  <div className="h-px bg-border flex-1"></div>
                </div>
              </div>

              <div className="text-center">
                <p className="text-2xl font-mono">{formatTime(flight.arrival.time)}</p>
                <p className="text-sm text-muted-foreground">{flight.arrival.airport}</p>
                <p className="text-sm">{flight.arrival.city}</p>
              </div>
            </div>
          </div>

          <div className="ml-8 text-right">
            <p className="text-3xl font-bold">${flight.price}</p>
            <p className="text-sm text-muted-foreground">per person</p>
            {flight.seatsLeft <= 5 && (
              <p className="text-sm text-orange-600 dark:text-orange-400 mt-1">
                Only {flight.seatsLeft} seats left
              </p>
            )}
          </div>
        </div>

        {flight.amenities.length > 0 && (
          <div className="flex items-center gap-4 mb-4 text-sm text-muted-foreground">
            {flight.amenities.includes('wifi') && (
              <div className="flex items-center gap-1">
                <WifiIcon className="w-4 h-4" />
                <span>WiFi</span>
              </div>
            )}
            {flight.amenities.includes('meals') && (
              <div className="flex items-center gap-1">
                <UtensilsIcon className="w-4 h-4" />
                <span>Meals</span>
              </div>
            )}
            {flight.amenities.includes('entertainment') && (
              <span>Entertainment</span>
            )}
            {flight.amenities.includes('power') && (
              <span>Power outlets</span>
            )}
          </div>
        )}

        <Button 
          onClick={() => onSelect(flight)} 
          className="w-full"
          variant={flight.seatsLeft <= 3 ? "destructive" : "default"}
        >
          Select Flight
        </Button>
      </CardContent>
    </Card>
  );
}