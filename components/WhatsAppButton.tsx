import { Button } from './ui/button';
import { MessageCircleIcon } from 'lucide-react';

export function WhatsAppButton() {
  const handleWhatsAppClick = () => {
    // Replace with your actual WhatsApp business number
    const phoneNumber = '+1234567890'; // Update this with your business WhatsApp number
    const message = encodeURIComponent("Hi! I'd like to book flights and create travel memories. Can you help me find the best deals?");
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;
    
    window.open(whatsappUrl, '_blank');
  };

  return (
    <Button
      onClick={handleWhatsAppClick}
      className="fixed bottom-6 right-6 z-50 h-14 w-14 rounded-full bg-green-500 hover:bg-green-600 shadow-lg hover:shadow-xl transition-all duration-300 animate-pulse"
      size="icon"
    >
      <MessageCircleIcon className="w-6 h-6 text-white" />
      <span className="sr-only">Chat on WhatsApp</span>
    </Button>
  );
}