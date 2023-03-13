function get_books()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/books.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function()
    {
        document.getElementById('books-data').innerHTML = this.responseText;
    }
    xhr.send('get_books');
}

function search(book){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/books.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function()
    {
        document.getElementById('books-data').innerHTML = this.responseText;
    }
    xhr.send('search&name='+book);
}

window.onload = function()
{
    get_books();
}