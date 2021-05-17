<br>
<form action="index.php" target="_self" enctype="multipart/form-data" method="POST" class="animate__animated animate__slideInRight animate__fast" id="searchform">
    <div class="col">
        <div class="form-group">
            <label for="depart">From</label>
            <select class="form-control" id="depart" name="from" required>
                <option value="">SELECT DEPARTURE CITY</option>
                <?php
                $query = "SELECT DISTINCT DEPART FROM busschedule ORDER BY DEPART";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $depart = $row['DEPART'];
                    echo "<option value='$depart'>$depart</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="dest">To</label>
            <select class="form-control" id="dest" name="to" required>
                <option value="">SELECT DESTINATION CITY</option>
                <?php
                $query = "SELECT DISTINCT DEST FROM busschedule ORDER BY DEST";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $dest = $row['DEST'];
                    echo "<option value='$dest'>$dest</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-primary" value="SEARCH" name="search">SEARCH BUSES</button><br>
</form>
<br>
