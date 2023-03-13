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

function toggle_status(id, val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/books.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function()
    {
        if (this.responseText == 1)
        {
            alertmsg('success', 'Status Toggled');
            get_books();
        }
        else
        {
            alertmsg('error', 'Server Down');
        }
    }

    xhr.send('toggle_status='+id+'&value='+val);
}


function remove_book(book_id)
{
    if(confirm("Are youn sure, you want to remove this book?"))
    {
        let data = new FormData();
        data.append('book_id', book_id);
        data.append('remove_book', '');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/books.php", true);

        xhr.onload = function()
        {
            if(this.responseText == 'quqntity_decreased')
            {
                alertmsg('success', 'Quantity Deleted Successfully!');
                get_books();
            }
            else if(this.responseText == 1)
            {
                alertmsg('success', 'Book Deleted Successfully!');
                get_books();
            }
            else
            {
                alertmsg('error', 'Book Removal Failed!');
            }
            
        }

        xhr.send(data);
    }
    get_books();  
}

let add_book_form = document.getElementById('add_book_form');

add_book_form.addEventListener('submit', function(e){
    e.preventDefault();
    add_book();
});

function add_book()
{
    let data = new FormData();
    data.append('add_book', '');
    data.append('name',add_book_form.elements['name'].value);
    data.append('auth',add_book_form.elements['auth'].value);
    data.append('edition',add_book_form.elements['edition'].value);
    data.append('quantity',add_book_form.elements['quantity'].value);
    data.append('dept',add_book_form.elements['dept'].value);


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/books.php", true);

    xhr.onload = function()
    {
        var myModal = document.getElementById('add-book');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText == 'quantity_upd')
        {
            alertmsg('success', 'Quantity of Book increased!');
            add_book_form.reset();
            get_books();
        }
        else if(this.responseText == '1')
        {
            alertmsg('success', 'New Book Added!');
            add_book_form.reset();
            get_books();
            
        }
        else
        {
            alertmsg('error', 'Server Down!');

        }
        
    }
    xhr.send(data);
}


// function edit_details(id)
// {
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "ajax/rooms.php", true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//     xhr.onload = function()
//     {
//         let data = JSON.parse(this.responseText);
//         edit_room_form.elements['name'].value = data.roomdata.name;
//         edit_room_form.elements['area'].value = data.roomdata.area;
//         edit_room_form.elements['price'].value = data.roomdata.price;
//         edit_room_form.elements['quantity'].value = data.roomdata.quantity;
//         edit_room_form.elements['adult'].value = data.roomdata.adult;
//         edit_room_form.elements['children'].value = data.roomdata.children;
//         edit_room_form.elements['desc'].value = data.roomdata.description;
//         edit_room_form.elements['room_id'].value = data.roomdata.id;

//         edit_room_form.elements['features'].forEach(el => {
//         if(data.features.includes(Number(el.value)))
//         {
//             el.checked = true;
//         }
//         });

//         edit_room_form.elements['facilities'].forEach(el => {
//         if(data.facilities.includes(Number(el.value)))
//         {
//             el.checked = true;
//         }
//         });
//     }
//     xhr.send('get_room='+id);
// }

// function submit_edit_room()
// {
//     let data = new FormData();
//     data.append('submit_edit_room', '');
//     data.append('room_id',edit_room_form.elements['room_id'].value);
//     data.append('name',edit_room_form.elements['name'].value);
//     data.append('area',edit_room_form.elements['area'].value);
//     data.append('price',edit_room_form.elements['price'].value);
//     data.append('quantity',edit_room_form.elements['quantity'].value);
//     data.append('adult',edit_room_form.elements['adult'].value);
//     data.append('children',edit_room_form.elements['children'].value);
//     data.append('desc',edit_room_form.elements['desc'].value);

//     let features = [];

//     edit_room_form.elements['features'].forEach(el => {
//         if(el.checked)
//         {
//             features.push(el.value);
//         }
//     });

//     let facilities = [];

//     edit_room_form.elements['facilities'].forEach(el => {
//         if(el.checked)
//         {
//             facilities.push(el.value);
//         }
//     });

//     data.append('features',JSON.stringify(features));
//     data.append('facilities',JSON.stringify(facilities));

//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "ajax/rooms.php", true);

//     xhr.onload = function()
//     {
//         var myModal = document.getElementById('edit-room');
//         var modal = bootstrap.Modal.getInstance(myModal);
//         modal.hide();

//         if(this.responseText == '1')
//         {
//             alertmsg('success', 'Room Data Edited!');
//             edit_room_form.reset();
//             get_all_rooms();
            
//         }
//         else
//         {
//             alertmsg('error', 'Server Down!');

//         }
        
//     }
//     xhr.send(data);
// }

window.onload = function()
{
    get_books();
}