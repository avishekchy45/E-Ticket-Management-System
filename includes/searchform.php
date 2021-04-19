<br>
<form action="index.php" target="_self" enctype="multipart/form-data" method="POST" class="animate__animated animate__slideInRight animate__fast" id="searchform">
    <div class="col">
        <div class="form-group">
            <label for="depart">From</label>
            <select class="form-control" id="depart" name="from" required>
                <option value="">SELECT DEPARTURE CITY</option>
                <?php
                $sql = "select distinct DEPARTURE from bus";
                $r = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($r)) {
                    $departure = $row['DEPARTURE'];
                    echo "<option value='$departure'>$departure</option>";
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
                $sql = "select distinct DESTINATION from bus";
                $r = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($r)) {
                    $destination = $row['DESTINATION'];
                    echo "<option value='$destination'>$destination</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <br><button type="submit" class="btn btn-outline-primary" value="SEARCH" name="search">SEARCH BUSES</button><br>
</form>
<br>
