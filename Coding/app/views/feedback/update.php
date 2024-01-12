
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Activity Feedback</h3>
    </div>
    <div class="card-body">


        <form method="POST" action="<?php echo URLROOT . "/feedback/update/" . $data['feedback']->feedback_id; ?>" enctype="multipart/form-data">
            <!-- need to check if activity already finished and echo activity name -->
                <!-- Student information -->
                <input type="hidden" name="feedback_id" value="<?php echo $data['feedback_id']; ?>">

                <div>
                    <h4 class="card-title">Student Information</h4>
                    <hr>

                    <div class="mb-10">
                        <label for="1\q1" class="required form-label">Name: </label>
                        <input type="text" name="st_fullname" class="form-control form-control-solid"
                            value="<?php echo $data['feedback']->st_fullname ?>" required />
                    </div>

                    <div class="mb-10">
                        <label for="1\q1" class="required form-label">University: </label>
                        <input type="text" name="univ_code" value="<?php echo $data['feedback']->univ_code ?>" class="form-control form-control-solid" />
                    </div>
</div>
            <!--Normal questions-->
            <div>
                <h4 class="card-title">What have you learned?</h4>
                <hr>
                <div class="mb-10">
                    <label for="1\q1" class="required form-label">1. What is your role in this activity?</label>
                    <input type="text" name="q1" class="form-control form-control-solid" aria-label="With textarea" value="<?php echo $data['feedback']->q1 ?>" required />
                </div>
                <div class="mb-10">
                    <label for="q2" class="required form-label">2. What knowledge/skills have you gained about the topics presented in this activity?</label>
                    <input type="text" name="q2" class="form-control form-control-solid" aria-label="With textarea" value="<?php echo $data['feedback']->q2 ?>" required />
                </div>
                <div class="mb-10">
                    <label for="q3" class="required form-label">3. How will you apply what you have learned to your field of study?</label>
                    <input type="text" name="q3" class="form-control form-control-solid" aria-label="With textarea" value="<?php echo $data['feedback']->q3 ?>" required />
                </div>
            </div>
            <!--Nominal questions-->
            <!-- ... (previous code) ... -->

<!--Nominal questions-->
<div class="mb-10">
    <h4 class="card-title">Feedback on The Contents and The Presenter</h4>
    <hr>
    <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
        <tr>
            <td colspan=4><h5 class="card-title">The Content</h5></td>
        </tr>
        <tr>
    <td>1. Was well organized</td>
    <td>
        <select name="content_q1" class="form-select">
            <option value="" disabled>-- Choose Here --</option>
            <option value="Strongly Disagree" <?php echo ($data['feedback']->content_q1 === "Strongly Disagree") ? 'selected' : ''; ?>>Strongly Disagree</option>
            <option value="Disagree" <?php echo ($data['feedback']->content_q1 === "Disagree") ? 'selected' : ''; ?>>Disagree</option>
            <option value="Neutral" <?php echo ($data['feedback']->content_q1 === "Neutral") ? 'selected' : ''; ?>>Neutral</option>
            <option value="Agree" <?php echo ($data['feedback']->content_q1 === "Agree") ? 'selected' : ''; ?>>Agree</option>
            <option value="Strongly Agree" <?php echo ($data['feedback']->content_q1 === "Strongly Agree") ? 'selected' : ''; ?>>Strongly Agree</option>
        </select>
    </td>
</tr>
        <tr>
            <td>2. Was based on credible and up-to-date information</td>
            <td>
                <select name="content_q2" class="form-select">
                <option value="" disabled selected>-- Choose Here --</option>
                    <option value="Strongly Disagree" <?php echo ($data['feedback']->content_q2 === "Strongly Disagree") ? 'selected' : ''; ?>>Strongly Disagree</option>
                    <option value="Disagree" <?php echo ($data['feedback']->content_q2 === "Disagree") ? 'selected' : ''; ?>>Disagree</option>
                    <option value="Neutral" <?php echo ($data['feedback']->content_q2 === "Neutral") ? 'selected' : ''; ?>>Neutral</option>
                    <option value="Agree" <?php echo ($data['feedback']->content_q2 === "Agree") ? 'selected' : ''; ?>>Agree</option>
                    <option value="Strongly Agree" <?php echo ($data['feedback']->content_q2 === "Strongly Agree") ? 'selected' : ''; ?>>Strongly Agree</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>3. Was easy to understand</td>
            <td>
                <select name="content_q3" class="form-select">
                <option value="" disabled selected>-- Choose Here --</option>
                    <option value="Strongly Disagree" <?php echo ($data['feedback']->content_q3 === "Strongly Disagree") ? 'selected' : ''; ?>>Strongly Disagree</option>
                    <option value="Disagree" <?php echo ($data['feedback']->content_q3 === "Disagree") ? 'selected' : ''; ?>>Disagree</option>
                    <option value="Neutral" <?php echo ($data['feedback']->content_q3 === "Neutral") ? 'selected' : ''; ?>>Neutral</option>
                    <option value="Agree" <?php echo ($data['feedback']->content_q3 === "Agree") ? 'selected' : ''; ?>>Agree</option>
                    <option value="Strongly Agree" <?php echo ($data['feedback']->content_q3 === "Strongly Agree") ? 'selected' : ''; ?>>Strongly Agree</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan=4><h5 class="card-title">The Presenter(s):</h5></td>
        </tr>
        <tr>
            <td>1. Was well-prepared</td>
            <td>
                <select name="presenter_q1" class="form-select">
                <option value="" disabled selected>-- Choose Here --</option>
                    <option value="Strongly Disagree" <?php echo ($data['feedback']->presenter_q1 === "Strongly Disagree") ? 'selected' : ''; ?>>Strongly Disagree</option>
                    <option value="Disagree" <?php echo ($data['feedback']->presenter_q1 === "Disagree") ? 'selected' : ''; ?>>Disagree</option>
                    <option value="Neutral" <?php echo ($data['feedback']->presenter_q1 === "Neutral") ? 'selected' : ''; ?>>Neutral</option>
                    <option value="Agree" <?php echo ($data['feedback']->presenter_q1 === "Agree") ? 'selected' : ''; ?>>Agree</option>
                    <option value="Strongly Agree" <?php echo ($data['feedback']->presenter_q1 === "Strongly Agree") ? 'selected' : ''; ?>>Strongly Agree</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>2. Used appropriate teaching methods</td>
            <td>
                <select name="presenter_q2" class="form-select">
                <option value="" disabled selected>-- Choose Here --</option>
                    <option value="Strongly Disagree" <?php echo ($data['feedback']->presenter_q2 === "Strongly Disagree") ? 'selected' : ''; ?>>Strongly Disagree</option>
                    <option value="Disagree" <?php echo ($data['feedback']->presenter_q2 === "Disagree") ? 'selected' : ''; ?>>Disagree</option>
                    <option value="Neutral" <?php echo ($data['feedback']->presenter_q2 === "Neutral") ? 'selected' : ''; ?>>Neutral</option>
                    <option value="Agree" <?php echo ($data['feedback']->presenter_q2 === "Agree") ? 'selected' : ''; ?>>Agree</option>
                    <option value="Strongly Agree" <?php echo ($data['feedback']->presenter_q2 === "Strongly Agree") ? 'selected' : ''; ?>>Strongly Agree</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>3. Was easy to understand</td>
            <td>
                <select name="presenter_q3" class="form-select">
                <option value="" disabled selected>-- Choose Here --</option>
                    <option value="Strongly Disagree" <?php echo ($data['feedback']->presenter_q3 === "Strongly Disagree") ? 'selected' : ''; ?>>Strongly Disagree</option>
                    <option value="Disagree" <?php echo ($data['feedback']->presenter_q3 === "Disagree") ? 'selected' : ''; ?>>Disagree</option>
                    <option value="Neutral" <?php echo ($data['feedback']->presenter_q3 === "Neutral") ? 'selected' : ''; ?>>Neutral</option>
                    <option value="Agree" <?php echo ($data['feedback']->presenter_q3 === "Agree") ? 'selected' : ''; ?>>Agree</option>
                    <option value="Strongly Agree"  <?php echo ($data['feedback']->presenter_q3 === "Strongly Agree") ? 'selected' : ''; ?>>Strongly Agree</option>
                </select>
            </td>
        </tr>
    </table>
</div>

<!-- ... (remaining code) ... -->

            
            <!--Upload project-->
            <div class="mb-10">
                <h4 class="card-title">Project upload (PDF)</h4>
                <?php if (!empty($data['feedback']->projectFile)): ?>
    <p>Current ProjectFile <?php echo $data['feedback']->projectFile; ?></p>
<?php endif; ?>
                <hr>
                <div class="mb-10">
                    <label for="projectFile" class="form-label">Upload your project here (if any): </label>
                    <input type="file" name="projectFile" class="form-control form-control-solid" accept="application/pdf" />
                </div>  
            </div>  
            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
        </form>

    </div>
    <div class="card-footer"></div>
</div>