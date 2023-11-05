// const express = require('express');
// const app = express();
// const htmlPdf = require('html-pdf');
// const bodyParser = require('body-parser');
// const path = require('path');

// app.use(bodyParser.urlencoded({ extended: false }));
// app.use(bodyParser.json());

// app.post('/TUPV-SS/generateAndSavePdf', (req, res) => {
//     const html = req.body.html; // HTML content to convert to PDF
//     const options = { format: 'Letter' }; // You can adjust the options as needed

//     // Generate the PDF and save it to a file
//     htmlPdf.create(html, options).toFile(path.join(__dirname, 'myfile.pdf'), (err, response) => {
//         if (err) {
//             console.error('Error generating PDF:', err);
//             res.status(500).send('Error generating PDF');
//         } else {
//             console.log('PDF saved to:', path.join(__dirname, 'myfile.pdf'));
//             res.status(200).send('PDF saved successfully');
//         }
//     });
// });

// app.listen(3306, () => {
//     console.log('Server is running on port 3306');
// });
