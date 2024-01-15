// Sample leaderboard data (you can replace this with your data)
let leaderboardData = [
  { name: "Player 1", score: 100 },
  { name: "Player 2", score: 85 },
  { name: "Player 3", score: 70 },
  { name: "Player 4", score: 60 },
  { name: "Player 5", score: 50 },
];

// Function to render the leaderboard
function renderLeaderboard() {
  const leaderboardList = document.getElementById("leaderboard-list");

  // Clear existing data
  leaderboardList.innerHTML = "";

  // Iterate through the leaderboard data and create list items
  leaderboardData.forEach((entry, index) => {
      const li = document.createElement("li");
      li.innerHTML = `
          <span>${index + 1}. ${entry.name}</span>
          <span>Score: ${entry.score}</span>
      `;
      leaderboardList.appendChild(li);
  });
}

// Function to simulate score updates (replace this with actual data updates)
function updateScores() {
  leaderboardData.forEach((entry) => {
      entry.score += Math.floor(Math.random() * 10); // Simulate score changes
  });
  // Sort the leaderboard based on scores in descending order
  leaderboardData.sort((a, b) => b.score - a.score);
}

// Periodically update the leaderboard and render it
function startLiveLeaderboard() {
  renderLeaderboard();
  setInterval(() => {
      updateScores();
      renderLeaderboard();
  }, 5000); // Update every 5 seconds (adjust this as needed)
}

// Call the startLiveLeaderboard function to begin live updates
startLiveLeaderboard();
