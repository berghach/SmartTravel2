
                    <div class="booking-form">
                        <h3>Booking Your Bus</h3>
                        <form action="process_booking.php" method="post">
                            <div class="select-option">
                                <label for="departure-city">Departure City:</label>
                                <select id="departure-city" name="departure-city">
                                    <?php foreach($Cities as $city) :?>
                                    <option value="<?php echo $city->getcity_name(); ?>">
                                    <?php echo $city->getcity_name();?>
                                    </option> 
                                    <?php endforeach; ?>    
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="destination-city">Destination City:</label>
                                <select id="destination-city" name="destination-city">
                                </select>
                            </div>
                            <div class="check-date">
                                <label for="travel-date">Date of Travel:</label>
                                <input type="text" class="date-input" id="travel-date" name="travel-date">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="passengers">Travelers:</label>
                                <select id="passengers" name="passengers">
                                    <?php
                                    for ($i = 1; $i <= 8; $i++) {
                                        echo "<option value='$i'>$i Passenger" . ($i > 1 ? "s" : "") . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit">search</button>
                        </form>
                    </div>
               