import type { Flight } from '../components/FlightCard';

export function generateMockFlights(departure: string, destination: string): Flight[] {
  const airlines = [
    'American Airlines', 'Delta Air Lines', 'United Airlines', 'Southwest Airlines',
    'JetBlue Airways', 'Alaska Airlines', 'Spirit Airlines', 'Frontier Airlines'
  ];

  const aircraftTypes = [
    'Boeing 737-800', 'Airbus A320', 'Boeing 787-9', 'Airbus A350',
    'Boeing 777-300ER', 'Embraer E175', 'Airbus A319', 'Boeing 757-200'
  ];

  const amenityOptions = [
    ['wifi', 'entertainment'],
    ['wifi', 'meals', 'entertainment'],
    ['meals', 'power'],
    ['wifi', 'power'],
    ['entertainment', 'power'],
    ['wifi', 'meals', 'entertainment', 'power'],
    []
  ];

  const flights: Flight[] = [];

  for (let i = 0; i < 12; i++) {
    const airline = airlines[Math.floor(Math.random() * airlines.length)];
    const aircraft = aircraftTypes[Math.floor(Math.random() * aircraftTypes.length)];
    const amenities = amenityOptions[Math.floor(Math.random() * amenityOptions.length)];
    
    // Generate realistic flight times
    const departureHour = 6 + Math.floor(Math.random() * 16); // 6 AM to 10 PM
    const departureMinute = [0, 15, 30, 45][Math.floor(Math.random() * 4)];
    const departureTime = `${departureHour.toString().padStart(2, '0')}:${departureMinute.toString().padStart(2, '0')}`;
    
    const flightDurationMinutes = 120 + Math.floor(Math.random() * 360); // 2-8 hours
    const arrivalTime = new Date();
    arrivalTime.setHours(departureHour);
    arrivalTime.setMinutes(departureMinute + flightDurationMinutes);
    
    const durationHours = Math.floor(flightDurationMinutes / 60);
    const durationMins = flightDurationMinutes % 60;
    const duration = `${durationHours}h ${durationMins}m`;
    
    const stops = Math.random() > 0.6 ? 0 : Math.random() > 0.7 ? 1 : 2;
    
    // Price varies by class and stops
    const basePrice = 200 + Math.floor(Math.random() * 600);
    const stopsPenalty = stops * 50;
    
    const classes: Flight['class'][] = ['economy', 'premium', 'business', 'first'];
    const flightClass = classes[Math.floor(Math.random() * classes.length)];
    
    const classMultiplier = {
      economy: 1,
      premium: 1.5,
      business: 3,
      first: 5
    };
    
    const price = Math.round((basePrice - stopsPenalty) * classMultiplier[flightClass]);

    flights.push({
      id: `FL${i + 1}${Date.now()}`,
      airline,
      flightNumber: `${airline.substring(0, 2).toUpperCase()}${1000 + Math.floor(Math.random() * 9000)}`,
      departure: {
        city: departure,
        airport: `${departure.substring(0, 3).toUpperCase()}`,
        time: departureTime
      },
      arrival: {
        city: destination,
        airport: `${destination.substring(0, 3).toUpperCase()}`,
        time: arrivalTime.toTimeString().substring(0, 5)
      },
      duration,
      price,
      stops,
      aircraft,
      amenities,
      seatsLeft: Math.floor(Math.random() * 20) + 1,
      class: flightClass
    });
  }

  return flights.sort((a, b) => a.price - b.price);
}

export function getAIRecommendation(flights: Flight[], criteria: string): string {
  if (!flights || flights.length === 0) return "No flights available to analyze.";

  const lowerCriteria = criteria.toLowerCase();

  if (lowerCriteria.includes('cheap') || lowerCriteria.includes('budget')) {
    const cheapest = flights[0]; // Already sorted by price
    return `💰 Best budget option: ${cheapest.airline} ${cheapest.flightNumber} for $${cheapest.price}. ${cheapest.stops === 0 ? 'Direct flight!' : `${cheapest.stops} stop(s)`}`;
  }

  if (lowerCriteria.includes('fast') || lowerCriteria.includes('quick')) {
    const fastest = flights.reduce((min, flight) => flight.duration < min.duration ? flight : min);
    return `⚡ Fastest option: ${fastest.airline} ${fastest.flightNumber} takes only ${fastest.duration} for $${fastest.price}.`;
  }

  if (lowerCriteria.includes('direct') || lowerCriteria.includes('nonstop')) {
    const directFlights = flights.filter(f => f.stops === 0);
    if (directFlights.length === 0) {
      return "❌ No direct flights available for this route. The flight with fewest stops has 1 stop.";
    }
    const bestDirect = directFlights[0];
    return `✈️ Best direct flight: ${bestDirect.airline} ${bestDirect.flightNumber} for $${bestDirect.price}, departing at ${bestDirect.departure.time}.`;
  }

  if (lowerCriteria.includes('comfort') || lowerCriteria.includes('amenities')) {
    const comfortFlights = flights.filter(f => f.amenities.length >= 2);
    if (comfortFlights.length === 0) {
      return "Basic flights available, but limited amenities on this route.";
    }
    const bestComfort = comfortFlights[0];
    return `🛋️ Most comfortable: ${bestComfort.airline} with ${bestComfort.amenities.join(', ')} for $${bestComfort.price}.`;
  }

  // Default recommendation
  const balanced = flights.find(f => f.stops <= 1 && f.price < flights[0].price * 1.5) || flights[0];
  return `🎯 Recommended: ${balanced.airline} ${balanced.flightNumber} offers good value at $${balanced.price} with ${balanced.duration} flight time.`;
}