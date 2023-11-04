// window.onload = function () {
//     document.getElementById("print-mo")
//         .addEventListener("click", () => {
//             const invoice = this.document.getElementById("invoice");
//             console.log(invoice);
//             console.log(window);
//             var opt = {
//                 margin: 1,
//                 filename: 'myfile.pdf',
//                 image: { type: 'jpeg', quality: 0.98 },
//                 html2canvas: { scale: 2 },
//                 jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//             };
//             html2pdf().from(invoice).set(opt).save();

//             const fs = require('fs');
//             const savePath = 'C:/xampp/htdocs/TUPV-SS/STORAGE/myfile.pdf'; 
//             fs.writeFileSync(savePath, pdf);
//             console.log('PDF saved to:', savePath);
//         })
// }




