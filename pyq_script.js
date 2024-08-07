/*<// Simulated data for demonstration purposes
const clubs = [
    { name: "Chess Club", description: "Join us for chess matches every Wednesday.", image: "chess.jpeg" },
    { name: "Coding Club", description: "Learn programming languages and build cool projects.", image: "code.jpeg" },
    { name: "Art Club", description: "Express your creativity through various art forms.", image: "art.jpg" },
    { name: "Sports Club", description: "Stay active and participate in various sports activities.", image: "sports.jpeg" }
];

// Function to display clubs on the webpage
function displayClubs() {
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

// Call the displayClubs function when the page loads
window.onload = displayClubs;
>*/
// Function to fetch club information from the server
function fetchClubs() {
    // Make an AJAX request to fetch club data from the server
    fetch('pyq_fetch.php')
        .then(response => response.json())
        .then(clubs => {
            // Call the function to display clubs on the webpage
            displayClubs(clubs);
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
        // Create a link element for each club
        const clubLink = document.createElement('a');
        clubLink.href = `club_details.php?id=${club.name}`; // Specify the URL of the new page with club ID as query parameter
        clubLink.classList.add('club');

        // Create elements for club information
        const clubImage = document.createElement('img');
        clubImage.src = club.image;
        clubImage.alt = club.name;

        const clubName = document.createElement('h2');
        clubName.textContent = club.name;

        const clubDescription = document.createElement('p');
        clubDescription.textContent = club.description;

        // Append club information to the link element
        clubLink.appendChild(clubImage);
        clubLink.appendChild(clubName);
        clubLink.appendChild(clubDescription);

        // Append the link element to the clubs grid
        clubsGrid.appendChild(clubLink);
    });
}

// Call the fetchClubs function when the page loads
window.onload = fetchClubs;
