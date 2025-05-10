document.querySelectorAll(".rating").forEach((ratingDiv) => {
        let stars = ratingDiv.querySelectorAll("span");
        let selectedRating = 0; // Store selected rating

        stars.forEach((star, index) => {
            // Highlight stars on hover
            star.addEventListener("mouseover", function () {
                highlightStars(ratingDiv, index + 1);
            });

            // Reset stars on mouseout, unless a rating is selected
            star.addEventListener("mouseout", function () {
                highlightStars(ratingDiv, selectedRating);
            });

            // Set rating on click
            star.addEventListener("click", function () {
                selectedRating = index + 1;
                highlightStars(ratingDiv, selectedRating);
                console.log(`Rated ${selectedRating} for ${ratingDiv.id}`);
                
                // Here you can send the rating to a server using AJAX if needed
            });
        });
    });

    // Function to highlight stars up to a given rating
    function highlightStars(container, rating) {
        let stars = container.querySelectorAll("span");
        stars.forEach((s, i) => {
            s.style.color = i < rating ? "gold" : "#fff";
        });
    }