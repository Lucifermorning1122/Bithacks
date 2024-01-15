const students = [
  { name: 'John Doe', rollNumber: '2021001', email: 'john@example.com', department: 'Computer Science' },
  { name: 'Jane Smith', rollNumber: '2021002', email: 'jane@example.com', department: 'Electrical Engineering' }
  // Add more students here
];

const cardsContainer = document.getElementById('cards-container');

students.forEach((student, index) => {
  const card = document.createElement('div');
  card.classList.add('card');
  card.innerHTML = `
    <h3>${student.name}</h3>
    <p>Roll Number: ${student.rollNumber}</p>
    <p>Email: ${student.email}</p>
    <p>Department: ${student.department}</p>
    <input type="number" name="event1_marks_${index}" min="0" max="100" placeholder="Event 1 Marks" required>
    <button type="button" onclick="submitMarks(${index})">Submit</button>
  `;
  cardsContainer.appendChild(card);
});

function submitMarks(index) {
  const marksInput = document.querySelector(`input[name="event1_marks_${index}"]`);
  const marks = marksInput.value;
  console.log(`Submitted marks for ${students[index].name}: ${marks}`);
  // Here you can add further processing, such as sending data to the server
}