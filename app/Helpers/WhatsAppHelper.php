<?php

namespace App\Helpers;

use App\Models\Setting;

class WhatsAppHelper
{
    /**
     * WhatsApp API base URL
     */
    private const WHATSAPP_API_URL = 'https://wa.me';

    /**
     * Generate WhatsApp click-to-chat link
     *
     * @param string|null $phone Phone number (with or without country code)
     * @param string|null $message Pre-filled message
     * @return string WhatsApp URL
     */
    public static function generateWhatsAppLink(?string $phone = null, ?string $message = null): string
    {
        $phone = $phone ?? self::getWhatsAppNumber();
        
        // Clean phone number - remove non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // Add Indonesia country code if not present
        if (!empty($phone) && !str_starts_with($phone, '62') && !str_starts_with($phone, '0')) {
            $phone = '62' . $phone;
        } elseif (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }
        
        $url = self::WHATSAPP_API_URL . '/' . $phone;
        
        if (!empty($message)) {
            $url .= '?text=' . urlencode($message);
        }
        
        return $url;
    }

    /**
     * Get WhatsApp number from settings
     *
     * @return string|null WhatsApp number or null if not set
     */
    public static function getWhatsAppNumber(): ?string
    {
        return Setting::get('site_whatsapp');
    }

    /**
     * Format pre-filled WhatsApp message based on type
     *
     * @param string $type Message type (quote, contact, consultation, etc.)
     * @param array $data Data to include in the message
     * @return string Formatted message
     */
    public static function formatWhatsAppMessage(string $type, array $data = []): string
    {
        $siteName = Setting::get('site_name', 'AKM Interior Design');
        
        return match ($type) {
            'quote' => self::formatQuoteMessage($data, $siteName),
            'contact' => self::formatContactMessage($data, $siteName),
            'consultation' => self::formatConsultationMessage($data, $siteName),
            'general' => self::formatGeneralMessage($data, $siteName),
            'portfolio_inquiry' => self::formatPortfolioInquiryMessage($data, $siteName),
            'service_inquiry' => self::formatServiceInquiryMessage($data, $siteName),
            default => $data['message'] ?? 'Hello, I want to know more about your services.',
        };
    }

    /**
     * Format quote request message
     */
    private static function formatQuoteMessage(array $data, string $siteName): string
    {
        $message = "Hello {$siteName},\n\n";
        $message .= "I'm interested in getting a quote for interior design services.\n\n";
        
        if (!empty($data['name'])) {
            $message .= "Name: {$data['name']}\n";
        }
        
        if (!empty($data['project_type'])) {
            $message .= "Project Type: {$data['project_type']}\n";
        }
        
        if (!empty($data['budget'])) {
            $message .= "Budget Range: {$data['budget']}\n";
        }
        
        if (!empty($data['description'])) {
            $message .= "\nProject Details:\n{$data['description']}\n";
        }
        
        $message .= "\nPlease contact me for further discussion.\nThank you!";
        
        return $message;
    }

    /**
     * Format contact inquiry message
     */
    private static function formatContactMessage(array $data, string $siteName): string
    {
        $message = "Hello {$siteName},\n\n";
        $message .= "I have a question regarding your services.\n\n";
        
        if (!empty($data['name'])) {
            $message .= "Name: {$data['name']}\n";
        }
        
        if (!empty($data['subject'])) {
            $message .= "Subject: {$data['subject']}\n";
        }
        
        if (!empty($data['message'])) {
            $message .= "\nMessage:\n{$data['message']}\n";
        }
        
        $message .= "\nLooking forward to your response.\nThank you!";
        
        return $message;
    }

    /**
     * Format consultation request message
     */
    private static function formatConsultationMessage(array $data, string $siteName): string
    {
        $message = "Hello {$siteName},\n\n";
        $message .= "I'd like to schedule a consultation for interior design.\n\n";
        
        if (!empty($data['name'])) {
            $message .= "Name: {$data['name']}\n";
        }
        
        if (!empty($data['preferred_date'])) {
            $message .= "Preferred Date: {$data['preferred_date']}\n";
        }
        
        if (!empty($data['project_type'])) {
            $message .= "Project Type: {$data['project_type']}\n";
        }
        
        $message .= "\nPlease let me know your available schedule.\nThank you!";
        
        return $message;
    }

    /**
     * Format general inquiry message
     */
    private static function formatGeneralMessage(array $data, string $siteName): string
    {
        $message = "Hello {$siteName},\n\n";
        
        if (!empty($data['message'])) {
            $message .= $data['message'];
        } else {
            $message .= "I'm interested in your interior design services. Could you please provide more information?";
        }
        
        if (!empty($data['name'])) {
            $message .= "\n\nBest regards,\n{$data['name']}";
        }
        
        return $message;
    }

    /**
     * Format portfolio inquiry message
     */
    private static function formatPortfolioInquiryMessage(array $data, string $siteName): string
    {
        $message = "Hello {$siteName},\n\n";
        $message .= "I'm interested in one of your portfolio projects.\n\n";
        
        if (!empty($data['portfolio_name'])) {
            $message .= "Project: {$data['portfolio_name']}\n";
        }
        
        if (!empty($data['name'])) {
            $message .= "My Name: {$data['name']}\n";
        }
        
        $message .= "\nCould you share more details about this project and similar services?\nThank you!";
        
        return $message;
    }

    /**
     * Format service inquiry message
     */
    private static function formatServiceInquiryMessage(array $data, string $siteName): string
    {
        $message = "Hello {$siteName},\n\n";
        $message .= "I'm interested in one of your services.\n\n";
        
        if (!empty($data['service_name'])) {
            $message .= "Service: {$data['service_name']}\n";
        }
        
        if (!empty($data['name'])) {
            $message .= "My Name: {$data['name']}\n";
        }
        
        $message .= "\nCould you provide more information about this service and pricing?\nThank you!";
        
        return $message;
    }

    /**
     * Generate WhatsApp share link for a URL
     *
     * @param string $url URL to share
     * @param string|null $text Optional text to accompany the URL
     * @return string WhatsApp share URL
     */
    public static function generateShareLink(string $url, ?string $text = null): string
    {
        $message = $text ? "{$text}\n\n{$url}" : $url;
        
        return 'https://wa.me/?text=' . urlencode($message);
    }
}
