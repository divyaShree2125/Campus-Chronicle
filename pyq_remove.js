document.addEventListener("DOMContentLoaded", function() {
    // Function to fetch club information from the server
    function fetchClubs() {
        fetch('pyq_fetch.php')
            .then(response => response.json())
            .then(clubs => {
                displayClubs(clubs);
                displayClubCheckboxes(clubs);
            })
            .catch(error => {
                console.error('Error fetching clubs:', error);
            });
    }

    // Function to display clubs on the webpage
    function displayClubs(clubs) {
        const clubsGrid = document.getElementById('clubs-grid');
        clubsGrid.innerHTML = '';
        clubs.forEach(club => {
            const clubElement = document.createElement('div');
            clubElement.classList.add('club');
            clubElement.innerHTML = `
                <img src="${club.image}" alt="${club.name}">
                <h2>${club.name}</h2>
                <p>${club.description}</p>
            `;
            clubsGrid.appendChild(clubElement);
        });
    }

    // Function to display checkboxes for removing clubs
    function displayClubCheckboxes(clubs) {
        const clubCheckboxes = document.getElementById('clubCheckboxes');
        clubCheckboxes.innerHTML = '';
        clubs.forEach(club => {
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'clubs[]';
            checkbox.value = club.id;

            const label = document.createElement('label');
            label.textContent = club.name;

            const div = document.createElement('div');
            div.appendChild(checkbox);
            div.appendChild(label);

            clubCheckboxes.appendChild(div);
        });
    }

    // Call the fetchClubs function when the page loads
    fetchClubs();
});
