<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Upcoming Events</h2>
    <ol>
        <?php foreach (Events::inFuture() as $event) : ?>
            <li>
                <?php echo $event->title(); ?><br>
                <?php echo $event->venue(); ?><br>

                <ol>
                    <?php foreach ($event->instancesGroupedByDate() as $date => $instances) : ?>
                        <li>
                            <?php
                            echo $date;

                            ?>
                            <?php foreach ($instances as $instance) : ?>
                        <li>
                            <?php
                                echo $instances->time('H:m');

                            ?><br>
                            <?php
                                echo $instances->venue;
                            ?><br>
                            <a href="#book">Book Now</a>
                        </li>
                    <?php endforeach; ?>
            </li>
        <?php endforeach; ?>
    </ol>
    </li>
<?php endforeach; ?>
</ol>

<h2>Passed Events</h2>
<ol>
    <?php foreach (Events::inPast() as $event) : ?>
        <li>
            <?php echo $event->title(); ?><br>
            <?php echo $event->dateRange(); ?>
        </li>
    <?php endforeach; ?>
</ol>

<h2>At Main House</h2>
<ol>
    <?php foreach (Events::atVenue('169613AMPLTTSJHPDBJLLSBRJCJPCDNRC') as $event) : ?>
        <li>
            <?php echo $event->title(); ?>
        </li>
    <?php endforeach; ?>
</ol>
</body>

</html>