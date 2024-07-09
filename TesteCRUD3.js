document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('createForm');
    const itemList = document.getElementById('itemList');
    const dataFile = '/data/data.json';

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const itemName = document.getElementById('itemName').value;

            if (itemName.trim() !== '') {
                const newItem = { name: itemName };
                addItem(newItem);
                form.reset();
                alert('Item criado com sucesso!');
            }
        });
    }

    if (itemList) {
        loadItems();
    }

    function addItem(item) {
        fetch(dataFile, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(item)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            displayItems(data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

    function loadItems() {
        fetch(dataFile)
        .then(response => response.json())
        .then(data => {
            displayItems(data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

    function displayItems(items) {
        itemList.innerHTML = '';
        items.forEach(item => {
            const listItem = document.createElement('li');
            listItem.textContent = item.name;
            listItem.className = 'list-group-item';
            itemList.appendChild(listItem);
        });
    }
});