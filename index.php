<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circle Calculator</title>

    <link rel="stylesheet" href="styles.css">
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

        <?php
        $radiusValue = '';
        $errorMessage = '';
        $circumference = null;
        $area = null;
        $volume = null;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $radiusValue = $_POST["radius"] ?? '';
            $radius = filter_var($radiusValue, FILTER_VALIDATE_FLOAT);

            if ($radius === false || $radius < 0) {
                $errorMessage = 'Please enter a valid radius greater than or equal to 0.';
            } else {
                $circumference = 2 * M_PI * $radius;
                $circumference = round($circumference, 2);

                $area = M_PI * pow($radius, 2);
                $area = round($area, 2);

                $volume = (4 / 3) * M_PI * pow($radius, 3);
                $volume = round($volume, 2);
            }
        }
        ?>

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
                        value="<?php echo htmlspecialchars((string) $radiusValue, ENT_QUOTES, 'UTF-8'); ?>"
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

        <?php if ($errorMessage !== ''): ?>
            <div class="message error" role="alert">
                <?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php elseif ($circumference !== null): ?>
            <section class="results">

                <div class="results-heading">
                    <span class="eyebrow">RESULTS</span>
                    <h2>Calculated values</h2>
                </div>

                <div class="result-grid">

                    <div class="result-card">
                        <span class="result-label">Circumference</span>
                        <strong>
                            <?php echo number_format($circumference, 2); ?>
                        </strong>
                        <small>units</small>
                    </div>

                    <div class="result-card">
                        <span class="result-label">Area</span>
                        <strong>
                            <?php echo number_format($area, 2); ?>
                        </strong>
                        <small>square units</small>
                    </div>

                    <div class="result-card">
                        <span class="result-label">Volume</span>
                        <strong>
                            <?php echo number_format($volume, 2); ?>
                        </strong>
                        <small>cubic units</small>
                    </div>

                </div>

            </section>
        <?php endif; ?>

    </main>

</body>
</html>