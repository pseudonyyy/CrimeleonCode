const express = require('express');
const mysql = require('mysql');
const cors = require('cors');

const app = express();
const port = 3000;

// Database connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root', // default XAMPP user
    password: '', // default XAMPP password
    database: 'crimeleon2'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Connected to database');
});

app.use(cors());

app.get('/api/places', (req, res) => {
    db.query('SELECT * FROM report', (err, results) => {
        if (err) throw err;
        res.json(results);
    });
    
});

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});
