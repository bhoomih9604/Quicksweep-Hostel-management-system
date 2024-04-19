document.addEventListener("DOMContentLoaded", function() {
    const timeSlotsContainer = document.getElementById("time-slots");
    let selectedDate = '';
  
    // Initialize FullCalendar
    $('#calendar').fullCalendar({
      selectable: true,
      select: function(start) {
        selectedDate = start.format('YYYY-MM-DD');
        displayTimeSlots(selectedDate);
      }
    });
  
    // Function to display time slots based on availability for the selected date
    function displayTimeSlots(date) {
      // Simulated availability data for demonstration purposes
      const availability = {
        '2024-03-18': ['08:00', '09:30', '10:00'], // Example availability for March 18, 2024
        '2024-03-19': ['08:00', '09:00', '10:00', '11:30'] // Example availability for March 19, 2024
        // Add more dates and availability as needed
      };
  
      // Clear previous time slots
      timeSlotsContainer.innerHTML = '';
  
      // Check if availability data exists for the selected date
      if (availability[date]) {
        // Generate time slots based on availability
        availability[date].forEach(time => {
          const timeSlot = createTimeSlotElement(time);
          timeSlotsContainer.appendChild(timeSlot);
        });
      } else {
        // If no availability data exists, display a message
        timeSlotsContainer.textContent = 'No availability for selected date';
      }
    }
  
    // Function to create a time slot element
    function createTimeSlotElement(time) {
      const timeSlot = document.createElement("div");
      timeSlot.className = "time-slot";
      timeSlot.textContent = time;
      timeSlot.addEventListener("click", function() {
        bookTimeSlot(selectedDate, time);
      });
      return timeSlot;
    }
  
    // Function to book a time slot
    function bookTimeSlot(date, time) {
      // You can implement booking logic here
      alert(`Booking confirmed for ${date} at ${time}`);
    }
  });
  