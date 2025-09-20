import { useState } from 'react';
import { FlightCard, Flight } from './FlightCard';
import { Button } from './ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from './ui/select';
import { Card, CardContent, CardHeader, CardTitle } from './ui/card';
import { Separator } from './ui/separator';
import { FilterIcon, SortAscIcon } from 'lucide-react';

interface FlightResultsProps {
  flights: Flight[];
  onFlightSelect: (flight: Flight) => void;
}

type SortOption = 'price-low' | 'price-high' | 'duration' | 'departure';

export function FlightResults({ flights, onFlightSelect }: FlightResultsProps) {
  const [sortBy, setSortBy] = useState<SortOption>('price-low');
  const [filterStops, setFilterStops] = useState<string>('all');
  const [filterAirline, setFilterAirline] = useState<string>('all');

  // Get unique airlines for filter
  const airlines = [...new Set(flights.map(f => f.airline))];

  // Apply filters and sorting
  const filteredAndSortedFlights = flights
    .filter(flight => {
      if (filterStops !== 'all') {
        const maxStops = filterStops === 'direct' ? 0 : parseInt(filterStops);
        if (flight.stops > maxStops) return false;
      }
      if (filterAirline !== 'all' && flight.airline !== filterAirline) return false;
      return true;
    })
    .sort((a, b) => {
      switch (sortBy) {
        case 'price-low':
          return a.price - b.price;
        case 'price-high':
          return b.price - a.price;
        case 'duration':
          return a.duration.localeCompare(b.duration);
        case 'departure':
          return a.departure.time.localeCompare(b.departure.time);
        default:
          return 0;
      }
    });

  if (flights.length === 0) {
    return (
      <Card className="w-full max-w-4xl mx-auto">
        <CardContent className="p-8 text-center">
          <p className="text-muted-foreground">No flights found. Try adjusting your search criteria.</p>
        </CardContent>
      </Card>
    );
  }

  return (
    <div className="w-full max-w-6xl mx-auto space-y-6">
      {/* Filters and Sort */}
      <Card>
        <CardHeader>
          <CardTitle className="flex items-center gap-2">
            <FilterIcon className="w-5 h-5" />
            Filter & Sort ({filteredAndSortedFlights.length} flights found)
          </CardTitle>
        </CardHeader>
        <CardContent>
          <div className="flex flex-wrap gap-4">
            <div className="space-y-2">
              <label className="text-sm">Sort by</label>
              <Select value={sortBy} onValueChange={(value: SortOption) => setSortBy(value)}>
                <SelectTrigger className="w-40">
                  <SelectValue />
                </SelectTrigger>
                <SelectContent>
                  <SelectItem value="price-low">Price: Low to High</SelectItem>
                  <SelectItem value="price-high">Price: High to Low</SelectItem>
                  <SelectItem value="duration">Duration</SelectItem>
                  <SelectItem value="departure">Departure Time</SelectItem>
                </SelectContent>
              </Select>
            </div>

            <div className="space-y-2">
              <label className="text-sm">Stops</label>
              <Select value={filterStops} onValueChange={setFilterStops}>
                <SelectTrigger className="w-32">
                  <SelectValue />
                </SelectTrigger>
                <SelectContent>
                  <SelectItem value="all">All</SelectItem>
                  <SelectItem value="direct">Direct</SelectItem>
                  <SelectItem value="1">Up to 1 stop</SelectItem>
                  <SelectItem value="2">Up to 2 stops</SelectItem>
                </SelectContent>
              </Select>
            </div>

            <div className="space-y-2">
              <label className="text-sm">Airline</label>
              <Select value={filterAirline} onValueChange={setFilterAirline}>
                <SelectTrigger className="w-40">
                  <SelectValue />
                </SelectTrigger>
                <SelectContent>
                  <SelectItem value="all">All Airlines</SelectItem>
                  {airlines.map(airline => (
                    <SelectItem key={airline} value={airline}>{airline}</SelectItem>
                  ))}
                </SelectContent>
              </Select>
            </div>

            <div className="flex items-end">
              <Button 
                variant="outline" 
                onClick={() => {
                  setSortBy('price-low');
                  setFilterStops('all');
                  setFilterAirline('all');
                }}
              >
                Clear Filters
              </Button>
            </div>
          </div>
        </CardContent>
      </Card>

      {/* Flight Results */}
      <div className="space-y-4">
        {filteredAndSortedFlights.map((flight) => (
          <FlightCard 
            key={flight.id} 
            flight={flight} 
            onSelect={onFlightSelect}
          />
        ))}
      </div>

      {filteredAndSortedFlights.length === 0 && (
        <Card>
          <CardContent className="p-8 text-center">
            <p className="text-muted-foreground">
              No flights match your current filters. Try adjusting your filter criteria.
            </p>
          </CardContent>
        </Card>
      )}
    </div>
  );
}