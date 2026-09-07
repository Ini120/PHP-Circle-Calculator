<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circle Calculator</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main class="calculator">

        <div class="calculator-header">
            <span class="eyebrow">PHP PROJECT</span>
            <h1>Circle Calculator</h1>
            <p>
                Enter the radius to calculate the area, circumference,
                and volume of a sphere.
            </p>
        </div>

        <form action="index.php" method="post">

            <div class="input-group">
                <label for="radius">Radius</label>

                <div class="input-wrapper">
                    <input
                        type="number"
                        name="radius"
                        id="radius"
                        step="any"
                        min="0"
                        placeholder="Enter radius"
                        required
                    >
                    <span>units</span>
                </div>
            </div>

            <button type="submit">
                Calculate
                <span>→</span>
            </button>

        </form>


        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $radius = $_POST["radius"];

            $circumference = 2 * pi() * $radius;
            $circumference = round($circumference, 2);

            $area = pi() * pow($radius, 2);
            $area = round($area, 2);

            $volume = (4 / 3) * pi() * pow($radius, 3);
            $volume = round($volume, 2);

        ?>

            <section class="results">

                <div class="results-heading">
                    <span class="eyebrow">RESULTS</span>
                    <h2>Calculated values</h2>
                </div>

                <div class="result-grid">

                    <div class="result-card">
                        <span class="result-label">Circumference</span>
                        <strong>
                            <?php echo $circumference; ?>
                        </strong>
                        <small>units</small>
                    </div>

                    <div class="result-card">
                        <span class="result-label">Area</span>
                        <strong>
                            <?php echo $area; ?>
                        </strong>
                        <small>square units</small>
                    </div>

                    <div class="result-card">
                        <span class="result-label">Volume</span>
                        <strong>
                            <?php echo $volume; ?>
                        </strong>
                        <small>cubic units</small>
                    </div>

                </div>

            </section>

        <?php
        }

        ?>

    </main>

</body>
</html>