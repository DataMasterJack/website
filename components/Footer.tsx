import { Button } from './ui/button';
import { Separator } from './ui/separator';

export function Footer() {
  const handleLegalClick = (type: 'privacy' | 'terms') => {
    // In a real app, these would open actual legal documents
    const content = type === 'privacy' 
      ? `Privacy Policy - Book Me Memories

We are committed to protecting your privacy and personal information. This policy explains how we collect, use, and protect your data when using our flight search and travel booking service.

Information We Collect:
• Search queries and travel preferences
• Device and browser information
• Cookies for enhanced user experience

How We Use Your Data:
• To provide personalized flight recommendations
• To improve our AI search algorithms
• To enhance user experience and security
• To help create memorable travel experiences

Data Protection:
• We use industry-standard encryption
• Your data is never sold to third parties
• You can request data deletion at any time

Contact us at privacy@bookmemories.com for any questions.`
      : `Terms and Conditions - Book Me Memories

Welcome to Book Me Memories. By using our service, you agree to these terms.

Service Usage:
• Book Me Memories is a flight search and comparison tool
• Prices shown are estimates and subject to change
• Actual booking is handled by airlines or travel partners

Group Bookings:
• Group rates apply to 10+ passengers
• Special terms may apply for large groups
• Contact support for custom arrangements

Limitations:
• We are not responsible for flight delays or cancellations
• Prices may vary at time of actual booking
• Service availability may vary by region

For support, contact us at support@bookmemories.com`;

    alert(content);
  };

  return (
    <footer className="border-t bg-background/95 backdrop-blur-sm">
      <div className="container mx-auto px-4 py-6">
        <div className="flex flex-col items-center space-y-4">
          <div className="flex items-center space-x-6 text-sm text-muted-foreground">
            <Button 
              variant="ghost" 
              size="sm"
              onClick={() => handleLegalClick('privacy')}
              className="text-muted-foreground hover:text-foreground"
            >
              Privacy Policy
            </Button>
            <Separator orientation="vertical" className="h-4" />
            <Button 
              variant="ghost" 
              size="sm"
              onClick={() => handleLegalClick('terms')}
              className="text-muted-foreground hover:text-foreground"
            >
              Terms & Conditions
            </Button>
            <Separator orientation="vertical" className="h-4" />
            <span>© 2024 Book Me Memories</span>
          </div>
          
          <div className="text-center text-xs text-muted-foreground max-w-2xl">
            <p>
              Book Me Memories uses advanced AI to find the best flight deals and create unforgettable travel experiences. 
              Group bookings available for 10+ passengers with special rates. Prices shown include taxes and fees. 
              Actual prices may vary at time of booking.
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
}