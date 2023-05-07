function genPDF() {
    var img;
    html2canvas(document.getElementById("section")).then(
        function (canvas) {
            img = canvas.toDataURL("image/png");
            var doc = new jsPDF('p', 'mm', 'a4');
            doc.addImage(img, 'PNG', 1, 0, 208, 0);
            doc.save('Report.pdf');
        });
    // doc.text("Blood Link Report!", 90, 5);
}

function genPDF2(id) {
    var img;
    html2canvas(document.getElementById(id)).then(
        function (canvas) {
            img = canvas.toDataURL("image/png");
            var doc = new jsPDF('landscape', 'mm', 'a4');
            var pageWidth = doc.internal.pageSize.getWidth();
            var imageWidth = 300;
            doc.addImage(img, 'PNG', 10, 0, 300, 0);
            doc.save('Report.pdf');
        });
}


function generatePDF() {
// Create a new jsPDF object
    var doc = new jsPDF();

// Loop through each div element
    var divs = document.getElementById('section');

    var html = divs.innerHTML;
    var style = window.getComputedStyle(divs);
    var fontSize = parseInt(style.getPropertyValue('font-size'));
    var fontStyle = style.getPropertyValue('font-style');
    doc.setFontSize(fontSize).setFontStyle(fontStyle);

    // Add the HTML content to the PDF
    doc.fromHTML(html);

    // Add a page break after each div (except the last one)

// Save the PDF document
    doc.save('document.pdf');
}