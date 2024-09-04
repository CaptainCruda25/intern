document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("myModal");
  const openModalBtn = document.getElementById("openModalBtn");
  const closeBtn = document.querySelector(".close");
  const addForm = document.getElementById("addForm");
  const responseMessage = document.getElementById("responseMessage");

  openModalBtn.onclick = () => {
    modal.style.display = "flex"; // Use flex to center the modal
  };

  closeBtn.onclick = () => {
    modal.style.display = "none";
  };

  window.onclick = (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };

  addForm.onsubmit = (event) => {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(addForm);
    const data = {
      course: formData.get("course"),
      school: formData.get("school"),
    };

    fetch("/add-course-school", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((data) => {
        responseMessage.textContent = "Course and School added successfully!";
        responseMessage.style.color = "green";
        addForm.reset();
      })
      .catch((error) => {
        responseMessage.textContent = "Error adding Course and School.";
        responseMessage.style.color = "red";
      });
  };
});
