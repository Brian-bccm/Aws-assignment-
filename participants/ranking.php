<?php include("parties/navbar.php"); ?>

<section class="ranking">
    <div class="wrapper ">
        <div class="ranking-layout">

            <h1>RANKINGS</h1>
            <br><br>

            <div class="search-ranking">
                <select id="filterCategory">
                    <option value="">Any Category</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <button onclick="filterRankings()">Filter</button>
            </div>

            <br><br>
            <div id="rankingTables"></div> <!-- Ranking Tables will be dynamically generated here -->
        </div>
    </div>
</section>

<?php include("parties/footer.php"); ?>

<script>
    function filterRankings() {
        var category = document.getElementById("filterCategory").value.trim();

        // Perform AJAX request to fetch filtered rankings based on input
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rankingTables").innerHTML = this.responseText;
            }
        };
        xhr.open("GET", "filter_rankings.php?category=" + category, true);
        xhr.send();
    }
</script>