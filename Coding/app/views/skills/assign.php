<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">Assign this skill to:</h3>

        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                
                <a href="<?php echo URLROOT;?>/skills" class="btn btn-light-primary"><i class="fa fa-home"></i></a>

            <?php endif; ?>
        </div>
    </div>

    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/skills/assign" method="POST" enctype="multipart/form-data">

            <label for="student">Student:</label>

            <?php if(isset($_SESSION['st_id'])):?>

                <!-- after evaluating feedback form -->
                <?php 
                    $this->db->query('SELECT * FROM st_profile WHERE st_id = :st_id');
                    $this->db->bind(':st_id', $_SESSION['st_id']);
                        
                    $result = $this->db->resultSet();
                ?>

                <select id="student" name="st_id" disabled>

                    <?php
                        while ($row = mysql_fetch_array($result)) {
                            echo "<option value='" . $row['st_id '] . "'>" . $row['st_fullname'] . "[" . $row['st_id '] . "]" . "</option>";
                        }
                    ?>

                </select>

            <?php else: ?>

                <!-- assign skill at skills list -->
                <?php 
                    $this->db->query('SELECT * FROM st_profile'); 

                    $result = $this->db->resultSet();
                ?>

                <select id="student" name="st_id">

                    <?php
                        while ($row = mysql_fetch_array($result)) {
                            echo "<option value='" . $row['st_id '] . "'>" . $row['st_fullname'] . "[" . $row['st_id '] . "]" . "</option>";                       
                        }
                    ?>

                </select>
                    
            <?php endif; ?>







            <label for="student">Skill:</label>

            <?php if(isset($_GET['skill_id'])):?>

                <!-- assign skill at skills list -->
                <?php 
                    $this->db->query('SELECT * FROM skills WHERE skill_id = :skill_id');
                    $this->db->bind(':skill_id', $_GET['skill_id']);

                    $result = $this->db->resultSet();
                ?>

                <select id="skill" name="skill_id" disabled>

                    <?php
                        while ($row = mysql_fetch_array($result)) {
                            echo "<option value='" . $row['skill_id '] . "'>" . $row['skill_name'] . "</option>";                       
                        }
                    ?>

                </select>

            <?php else: ?>

                <!-- after evaluating feedback form -->
                <?php 
                    $this->db->query('SELECT * FROM skills'); 

                    $result = $this->db->resultSet();
                ?>

                <select id="skill" name="skill_id">

                    <?php
                        while ($row = mysql_fetch_array($result)) {
                            echo "<option value='" . $row['skill_id '] . "'>" . $row['skill_name'] . "</option>";                       
                        }
                    ?>

                </select>
                    
            <?php endif; ?>

            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>

</div>