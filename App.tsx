import { useState } from 'react';
import { ChatInterface } from './components/ChatInterface';
import { AnimatedBackground } from './components/AnimatedBackground';
import { Footer } from './components/Footer';
import { WhatsAppButton } from './components/WhatsAppButton';
import { Flight } from './components/FlightCard';
import { Button } from './components/ui/button';
import { SparklesIcon } from 'lucide-react';
import bookMeMemoriesLogo from 'figma:asset/80174e5cf1bf74b7794739e45a662e20a6941ce5.png';

export default function App() {
  const [selectedFlight, setSelectedFlight] = useState<Flight | null>(null);

  const handleFlightSelect = (flight: Flight) => {
    setSelectedFlight(flight);
    // In a real app, this would navigate to booking page
    alert(`Selected ${flight.airline} ${flight.flightNumber} for $${flight.price}. This would proceed to booking in a real application.`);
  };

  return (
    <div className="min-h-screen bg-background relative flex flex-col">
      <AnimatedBackground />
      
      <div className="relative z-10 flex flex-col min-h-screen">
        {/* Header */}
        <div className="text-center py-8 px-4">
          <div className="flex items-center justify-center gap-3 mb-4">
            <img 
              src={bookMeMemoriesLogo} 
              alt="Book Me Memories" 
              className="w-12 h-12 object-contain"
            />
            <h1 className="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
              Book Me Memories
            </h1>
            <SparklesIcon className="w-6 h-6 text-primary animate-pulse" />
          </div>
          <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
            Your AI-powered travel companion. Create unforgettable memories with the best flight deals and group bookings.
          </p>
        </div>

        {/* Main Chat Interface */}
        <div className="flex-1 container mx-auto px-4 pb-8">
          <ChatInterface onFlightSelect={handleFlightSelect} />
        </div>

        {/* Footer */}
        <Footer />
      </div>

      {/* WhatsApp Chat Button */}
      <WhatsAppButton />
    </div>
  );
}