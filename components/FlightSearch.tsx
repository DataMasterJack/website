import { useState } from 'react';
import { Button } from './ui/button';
import { Input } from './ui/input';
import { Label } from './ui/label';
import { Card, CardContent } from './ui/card';
import { CalendarIcon, MapPinIcon, UsersIcon, PlaneTakeoffIcon } from 'lucide-react';

interface FlightSearchProps {
  onSearch: (searchData: SearchData) => void;
}

export interface SearchData {
  departure: string;
  destination: string;
  departureDate: string;
  returnDate?: string;
  passengers: number;
  tripType: 'one-way' | 'round-trip';
}

export function FlightSearch({ onSearch }: FlightSearchProps) {
  const [searchData, setSearchData] = useState<SearchData>({
    departure: '',
    destination: '',
    departureDate: '',
    returnDate: '',
    passengers: 1,
    tripType: 'round-trip'
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    onSearch(searchData);
  };

  const popularDestinations = [
    'New York', 'Los Angeles', 'Chicago', 'Miami', 'Las Vegas',
    'San Francisco', 'Seattle', 'Boston', 'Denver', 'Austin'
  ];

  return (
    <Card className="w-full max-w-4xl mx-auto">
      <CardContent className="p-6">
        <div className="flex items-center gap-2 mb-6">
          <PlaneTakeoffIcon className="w-6 h-6 text-primary" />
          <h2>Search Flights</h2>
        </div>

        <form onSubmit={handleSubmit} className="space-y-6">
          {/* Trip Type Toggle */}
          <div className="flex gap-4">
            <label className="flex items-center gap-2 cursor-pointer">
              <input
                type="radio"
                name="tripType"
                value="round-trip"
                checked={searchData.tripType === 'round-trip'}
                onChange={(e) => setSearchData({ ...searchData, tripType: e.target.value as 'round-trip' })}
                className="text-primary"
              />
              <span>Round Trip</span>
            </label>
            <label className="flex items-center gap-2 cursor-pointer">
              <input
                type="radio"
                name="tripType"
                value="one-way"
                checked={searchData.tripType === 'one-way'}
                onChange={(e) => setSearchData({ ...searchData, tripType: e.target.value as 'one-way' })}
                className="text-primary"
              />
              <span>One Way</span>
            </label>
          </div>

          {/* Main Search Fields */}
          <div className="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div className="space-y-2">
              <Label htmlFor="departure" className="flex items-center gap-2">
                <MapPinIcon className="w-4 h-4" />
                From
              </Label>
              <Input
                id="departure"
                placeholder="Departure city"
                value={searchData.departure}
                onChange={(e) => setSearchData({ ...searchData, departure: e.target.value })}
                list="destinations"
                required
              />
            </div>

            <div className="space-y-2">
              <Label htmlFor="destination" className="flex items-center gap-2">
                <MapPinIcon className="w-4 h-4" />
                To
              </Label>
              <Input
                id="destination"
                placeholder="Destination city"
                value={searchData.destination}
                onChange={(e) => setSearchData({ ...searchData, destination: e.target.value })}
                list="destinations"
                required
              />
            </div>

            <div className="space-y-2">
              <Label htmlFor="departureDate" className="flex items-center gap-2">
                <CalendarIcon className="w-4 h-4" />
                Departure
              </Label>
              <Input
                id="departureDate"
                type="date"
                value={searchData.departureDate}
                onChange={(e) => setSearchData({ ...searchData, departureDate: e.target.value })}
                min={new Date().toISOString().split('T')[0]}
                required
              />
            </div>

            {searchData.tripType === 'round-trip' && (
              <div className="space-y-2">
                <Label htmlFor="returnDate" className="flex items-center gap-2">
                  <CalendarIcon className="w-4 h-4" />
                  Return
                </Label>
                <Input
                  id="returnDate"
                  type="date"
                  value={searchData.returnDate}
                  onChange={(e) => setSearchData({ ...searchData, returnDate: e.target.value })}
                  min={searchData.departureDate || new Date().toISOString().split('T')[0]}
                />
              </div>
            )}

            <div className="space-y-2">
              <Label htmlFor="passengers" className="flex items-center gap-2">
                <UsersIcon className="w-4 h-4" />
                Passengers
              </Label>
              <Input
                id="passengers"
                type="number"
                min="1"
                max="9"
                value={searchData.passengers}
                onChange={(e) => setSearchData({ ...searchData, passengers: parseInt(e.target.value) })}
                required
              />
            </div>
          </div>

          <Button type="submit" size="lg" className="w-full">
            Search Flights
          </Button>
        </form>

        {/* Popular Destinations */}
        <div className="mt-6">
          <p className="mb-3 text-muted-foreground">Popular destinations:</p>
          <div className="flex flex-wrap gap-2">
            {popularDestinations.map((destination) => (
              <button
                key={destination}
                type="button"
                onClick={() => setSearchData({ ...searchData, destination })}
                className="px-3 py-1 text-sm bg-muted hover:bg-muted/80 rounded-full transition-colors"
              >
                {destination}
              </button>
            ))}
          </div>
        </div>

        {/* Datalist for autocomplete */}
        <datalist id="destinations">
          {popularDestinations.map((destination) => (
            <option key={destination} value={destination} />
          ))}
        </datalist>
      </CardContent>
    </Card>
  );
}