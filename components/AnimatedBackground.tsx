import { useEffect, useState } from 'react';

const globalCities = [
  'New York', 'London', 'Tokyo', 'Paris', 'Sydney', 'Dubai', 'Singapore', 'Los Angeles',
  'Barcelona', 'Amsterdam', 'Rome', 'Berlin', 'Mumbai', 'Bangkok', 'Istanbul', 'Seoul',
  'Toronto', 'Mexico City', 'São Paulo', 'Cairo', 'Moscow', 'Beijing', 'Buenos Aires',
  'Prague', 'Vienna', 'Athens', 'Lisbon', 'Stockholm', 'Copenhagen', 'Oslo', 'Helsinki',
  'Warsaw', 'Budapest', 'Zurich', 'Geneva', 'Brussels', 'Frankfurt', 'Munich', 'Milan',
  'Venice', 'Florence', 'Madrid', 'Seville', 'Porto', 'Dublin', 'Edinburgh', 'Manchester',
  'Liverpool', 'Miami', 'Las Vegas', 'Chicago', 'San Francisco', 'Seattle', 'Boston',
  'Washington DC', 'Philadelphia', 'Atlanta', 'Dallas', 'Houston', 'Phoenix', 'Denver'
];

export function AnimatedBackground() {
  const [cityPositions, setCityPositions] = useState<Array<{
    city: string;
    x: number;
    y: number;
    opacity: number;
    size: number;
    speed: number;
  }>>([]);

  useEffect(() => {
    // Initialize city positions
    const initialCities = Array.from({ length: 30 }, (_, i) => ({
      city: globalCities[Math.floor(Math.random() * globalCities.length)],
      x: Math.random() * 100,
      y: Math.random() * 100,
      opacity: Math.random() * 0.1 + 0.02,
      size: Math.random() * 0.8 + 0.6,
      speed: Math.random() * 0.5 + 0.1
    }));
    setCityPositions(initialCities);
  }, []);

  useEffect(() => {
    const interval = setInterval(() => {
      setCityPositions(prev => prev.map(city => ({
        ...city,
        x: (city.x + city.speed) % 110, // Move and wrap around
        y: city.y + (Math.sin(Date.now() * 0.001 + city.x) * 0.1), // Subtle floating motion
        opacity: Math.sin(Date.now() * 0.002 + city.x * 0.1) * 0.05 + 0.05 // Gentle opacity pulse
      })));
    }, 100);

    return () => clearInterval(interval);
  }, []);

  return (
    <div className="fixed inset-0 overflow-hidden pointer-events-none z-0">
      {cityPositions.map((city, index) => (
        <div
          key={`${city.city}-${index}`}
          className="absolute text-muted-foreground/20 transition-all duration-1000 ease-out select-none"
          style={{
            left: `${city.x}%`,
            top: `${city.y}%`,
            opacity: city.opacity,
            fontSize: `${city.size}rem`,
            transform: `translateX(-50%) translateY(-50%)`,
          }}
        >
          {city.city}
        </div>
      ))}
    </div>
  );
}