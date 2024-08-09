// Array of motivational quotes
const quotes = [
    "bawal sabay-sabay, dapat sunod-sunod - Joshua (2024)",
    "The only way to do great work is to love what you do. - Steve Jobs",
    "Success is not the key to happiness. Happiness is the key to success. - Albert Schweitzer",
    "Believe you can and you're halfway there. - Theodore Roosevelt",
    "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
    "You miss 100% of the shots you don’t take. - Wayne Gretzky",
    "Success usually comes to those who are too busy to be looking for it. - Henry David Thoreau",
    "Don’t watch the clock; do what it does. Keep going. - Sam Levenson",
    "The harder you work for something, the greater you’ll feel when you achieve it. - Unknown",
    "Dream bigger. Do bigger. - Unknown",
    "Push yourself, because no one else is going to do it for you. - Unknown", 
    "From Trece to Salitran Dasma, 37 Pesos - Carl Emmanuel Cruda"
];

let currentIndex = 0;

// Function to update the quote with a fade-in effect
function updateQuote() {
    const quoteElement = document.getElementById('quote');
    quoteElement.style.opacity = 0; // Fade out
    setTimeout(() => {
        quoteElement.textContent = quotes[currentIndex];
        quoteElement.style.opacity = 1; // Fade in
    }, 500); // Short delay for fade-out effect
    
    // Update index for next quote
    currentIndex = (currentIndex + 1) % quotes.length;
}

// Initialize the first quote and start the rotation
updateQuote();
setInterval(updateQuote, 5000); // Change quote every 20 seconds
