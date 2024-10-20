const express = require('express');
const { exec } = require('child_process');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();
const PORT = 3000;

// Middleware
app.use(bodyParser.json());

// Serve home.html when the root URL is accessed
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'home.html'));
});

// Serve static files from 'public' directory (excluding index.html)
app.use(express.static('public'));

// Endpoint to interact with the C++ chatbot
app.post('/chat', (req, res) => {
    const userInput = req.body.message; // Get user input

    // Execute the C++ chatbot program
    exec(`./chatbot "${userInput}"`, (error, stdout, stderr) => {
        if (error) {
            console.error(`Error executing chatbot: ${error.message}`);
            return res.status(500).json({ error: 'Internal Server Error' });
        }
        if (stderr) {
            console.error(`Chatbot stderr: ${stderr}`);
            return res.status(500).json({ error: 'Internal Server Error' });
        }
        res.json({ response: stdout.trim() }); // Send response from chatbot back to client, trimming whitespace
    });
});

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
