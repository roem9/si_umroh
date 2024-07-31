<?= $this->extend('soal/layout/soal_layout') ?>

<?= $this->section('sesi-listening') ?>
    <div class="card mb-3">
        <div class="card-body">
            <center>
                <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('public/assets/myaudio/listening-gt-002.mp3?t='.time())?>" type="audio/mpeg"></audio>
                <progress id="seekbar-1" value="0" max="1" style="width:100%;"></progress><br>
                <button class="btn btn-success btnAudio" data-id="1" type="button">play</button>
                <p><small class="text-danger"><i>note : The audio can only be played once</i></small></p>
            </center>
        </div>
    </div>

    <div class="card mb-3 soal">
        <div class="card-body">
            <center><b>IELTS LISTENING</b></center>
            <p class="question">SECTION 1</p>
            <p class="question">
                    Questions 1-5 <br>
                    Complete the notes below <br>
                    Write NO MORE THAN THREE WORDS for each answer.<br>
            </p>
            <table>

            </table>
            <center>
                <table class="tableSoal w-50 mb-3">
                    <tr>
                        <td><center>Transport from Airport to Milton</center></td>
                    </tr>
                    <tr>
                        <td>
                            Example : Answer<br>
                            Distance : 147 miles
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Options : </p>
                            <p>&#8226; Car hire</p>
                            <p>&emsp;&emsp; Don’t want to drive</p>
                            <p>&#8226; <b>1)</b><?= soal_isian_ielts("jawaban_listening[0]")?></p>
                            <p>&emsp;&emsp; - expensive</p>
                            <p>&#8226; Grey hound bus</p>
                            <p>&emsp;&emsp; - $15 single $27,50 return</p>
                            <p>&emsp;&emsp; - Direct to the <b>2)</b><?= soal_isian_ielts("jawaban_listening[1]")?></p>
                            <p>&emsp;&emsp; - Long <b>3)</b><?= soal_isian_ielts("jawaban_listening[2]")?></p>
                            <p>&#8226; Airport Shuttle</p>
                            <p>&emsp;&emsp; - <b>4)</b><?= soal_isian_ielts("jawaban_listening[3]")?> service</p>
                            <p>&emsp;&emsp; - Every 2 hours</p>
                            <p>&emsp;&emsp; - $35 single $65 return</p>
                            <p>&emsp;&emsp; - Need to <b>5)</b><?= soal_isian_ielts("jawaban_listening[4]")?> service</p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Questions 6-10<br>
                Complete the booking from below:<br>
                Write ONE WORD AND/OR A NUMBER for each answer:<br>
            </p>
            <center>
                <table class="tableSoal w-75 mb-3">
                    <tr>
                        <td>
                            <p><center><b>AIRPORT SHUTTLE BOOKING FORM</b></center></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>TO : </b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Milton </p>
                            <p><b>Date : </b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>6)</b><?= soal_isian_ielts("jawaban_listening[5]")?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<b>No. of passenger</b> : One</p>
                            <p><b>Bus Time :</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>7)</b><?= soal_isian_ielts("jawaban_listening[6]")?> pm&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Type of ticket</b> : Single</p>
                            <p><b>Name :</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &nbsp;<b>Janet 8)</b><?= soal_isian_ielts("jawaban_listening[7]")?></p>
                            <p><b>Flight No :</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>9)</b><?= soal_isian_ielts("jawaban_listening[8]")?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>From</b> : London Heathrow</p>
                            <p><b>Address in Milton :</b>&emsp;&emsp;Vacation Motel, 24, Kitchener Street</p>
                            <p><b>Fare :</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;$35</p>
                            <p><b>Credit Card No :</b>&emsp;&emsp;&emsp;(Visa) <b>10)</b><?= soal_isian_ielts("jawaban_listening[9]")?></p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">SECTION 2 Question 11-20</p>
            <p class="question">
                Questions 11 – 16<br>
                Choose the correct letter A, B, or C
            </p>
            <?php
                $data_soal_11_16  = [
                    [
                        "no" => 11,
                        "soal" => "PS Camping has been organizing holidays for",
                        "pilihan" => [
                            "<b>A.</b> 15 years.",
                            "<b>B.</b> 20 years.",
                            "<b>C.</b> 25 years."
                        ],
                        "name" => "jawaban_listening[10]"
                    ],
                    [
                        "no" => 12,
                        "soal" => "The company has most camping sites in",
                        "pilihan" => [
                            "<b>A.</b> France.",
                            "<b>B.</b> Italy.",
                            "<b>C.</b> Switzerland."
                        ],
                        "name" => "jawaban_listening[11]"
                    ],
                    [
                        "no" => 13,
                        "soal" => "Which organized activity can children do every day of the week?",
                        "pilihan" => [
                            "<b>A.</b> football",
                            "<b>B.</b> drama",
                            "<b>C.</b> model making"
                        ],
                        "name" => "jawaban_listening[12]"
                    ],
                    [
                        "no" => 14,
                        "soal" => "Some areas of the sites have a ‘no noise’ rule after",
                        "pilihan" => [
                            "<b>A.</b> 9.30 p.m.",
                            "<b>B.</b> 10.00 p.m.",
                            "<b>C.</b> 10.30 p.m."
                        ],
                        "name" => "jawaban_listening[13]"
                    ],
                    [
                        "no" => 15,
                        "soal" => "The holiday insurance that is offered by PS Camping",
                        "pilihan" => [
                            "<b>A.</b> can be charged on an annual basis.",
                            "<b>B.</b> is included in the price of the holiday.",
                            "<b>C.</b> must be taken out at the time of booking."
                        ],
                        "name" => "jawaban_listening[14]"
                    ],
                    [
                        "no" => 16,
                        "soal" => "Customers who recommend PS Camping to friends will receive",
                        "pilihan" => [
                            "<b>A.</b> a free gift.",
                            "<b>B.</b> an upgrade to a luxury tent.",
                            "<b>C.</b> a discount."
                        ],
                        "name" => "jawaban_listening[15]"
                    ],
                ];
            ?>
            <?php foreach ($data_soal_11_16 as $data_soal) :?>
                <?= soal_pg_ielts($data_soal)?>
            <?php endforeach;?>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Questions 17 – 20 <br>
                What does the speaker say about the following items? <br>
                Write the correct letter: A, B or C next to question 17 – 20 <br>
            </p>
            
            <center>
                <table class="tableSoal w-40 mb-3">
                    <tr>
                        <td>
                            <p><b>A</b> They are provided in all tents.</p>
                            <p><b>B</b> They are found in central areas of the campsite.</p>
                            <p><b>C</b> They are available on request.</p>
                        </td>
                    </tr>
                </table>
            </center>

            <p><b>17)</b> Barbecues <?= soal_isian_ielts("jawaban_listening[16]")?></p>
            <p><b>18)</b> Toys <?= soal_isian_ielts("jawaban_listening[17]")?></p>
            <p><b>19)</b> Cool boxes <?= soal_isian_ielts("jawaban_listening[18]")?></p>
            <p><b>20)</b> Mops and buckets <?= soal_isian_ielts("jawaban_listening[19]")?></p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                SECTION 3 Questions 21 – 30
            </p>
            <p class="question">
                Questions 21 -23<br>
                Complete the notes below<br>
                Write ONE WORD ONLY for each answer:<br>
            </p>
            
            <center>
                <table class="tableSoal w-50 mb-3">
                    <tr>
                        <td>
                            <center>DIFFERENCES BETWEEN INDIVIDUALS IN THE WORKPLACE</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Individuals bring different:</p>
                            <p>&emsp; &#8226; Ideas</p>
                            <p>&emsp; &#8226; <b>21)</b><?= soal_isian_ielts("jawaban_listening[20]")?></p>
                            <p>&emsp; &#8226; Learning experiences</p>
                            <p>Work behavior difference are due to:</p>
                            <p>&emsp; &#8226; Personality</p>
                            <p>&emsp; &#8226; <b>22)</b><?= soal_isian_ielts("jawaban_listening[21]")?></p>
                            <p>Effects of diversity on companies</p>
                            <p>&emsp; <i>Advantage</i> : diversity develops <b>23)</b><?= soal_isian_ielts("jawaban_listening[22]")?></p>
                            <p>&emsp; <i>Disadvantage</i> : diversity can cause conflict</p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Question 24 -27<br>
                Choose the correct letter A, B or C
            </p>
            <?php
                $data_soal_24_27 = [
                    [ 
                        "no" => 24, 
                        "soal" => "Janice thinks that employers should encourage workers who are",
                        "pilihan" => [
                            "<b>A.</b> potential leaders.",
                            "<b>B.</b> open to new ideas.",
                            "<b>C.</b> good at teamwork."
                        ],
                        "name" => "jawaban_listening[23]"
                    ],
                    [ 
                        "no" => 25, 
                        "soal" => "Janice suggests that managers may find it difficult to",
                        "pilihan" => [
                            "<b>A.</b> form successful groups.",
                            "<b>B.</b> balance conflicting needs.",
                            "<b>C.</b> deal with uncooperative workers."
                        ],
                        "name" => "jawaban_listening[24]"
                    ],
                    [ 
                        "no" => 26, 
                        "soal" => "Janice believes employers should look for job applicants who",
                        "pilihan" => [
                            "<b>A.</b> can think independently.",
                            "<b>B.</b> will obey the system.",
                            "<b>C.</b> can solve problems."
                        ],
                        "name" => "jawaban_listening[25]"
                    ],
                    [ 
                        "no" => 27, 
                        "soal" => "Janice believes managers should",
                        "pilihan" => [
                            "<b>A.</b> demonstrate good behaviour.",
                            "<b>B.</b> encourage co-operation early on.",
                            "<b>C.</b> increase financial incentives."
                        ],
                        "name" => "jawaban_listening[26]"
                    ],
                ];
            ?>

            <?php foreach ($data_soal_24_27 as $data_soal) :?>
                <?= soal_pg_ielts($data_soal)?>
            <?php endforeach;?>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Question 28 – 30<br>
                Complete the sentences below:<br>
                Write ONE WORD ONLY for each answer:<br>
            </p>
            <p>28. All managers need to understand their employees and recognize their company’s <?= soal_isian_ielts("jawaban_listening[27]")?></p>
            <p>29. When managing change, increasing the company’s	may be more important than employee satisfaction. <?= soal_isian_ielts("jawaban_listening[28]")?></p>
            <p>30. During periods of change, managers may have to cope with increased amounts of <?= soal_isian_ielts("jawaban_listening[29]")?></p>

        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                SECTION 4	Questions 31 – 40
            </p>
            <p class="question">
                Questions 31 – 35 <br>
                Complete the notes below: <br>
                Write ONE WORD ONLY for each answer:
            </p>

            <center>
                <table class="tableSoal w-50 mb-3">
                    <tr>
                        <td>
                            <p>SEMINAR ON ROCK ART</p>
                            <p>Preparation for fieldwork trip to Namibia in <b>31)<?= soal_isian_ielts("jawaban_listening[30]")?></b></p>
                            <p>Rock art in Namibia may be</p>
                            <p>&emsp; &#8226;Paintings</p>
                            <p>&emsp; &#8226;Engravings</p>
                            <p>Earliest explanation of engravings of animal footprints</p>
                            <p>They were used to help 32) <?= soal_isian_ielts("jawaban_listening[31]")?>learn about tracking</p>
                            <p><b>But:</b></p>
                            <p>&emsp; &#8226; Why are the tracks usually 33)<?= soal_isian_ielts("jawaban_listening[32]")?>?</p>
                            <p>&emsp; &#8226; Why are some engravings realistic and others unrealistic?</p>
                            <p>&emsp; &#8226; Why are the unrealistic animals sometimes half 34)<?= soal_isian_ielts("jawaban_listening[33]")?>?</p>
                            <p><b>More recent explanation:</b></p>
                            <p>Wise men may have been trying to control wild animals with <b>35)<?= soal_isian_ielts("jawaban_listening[34]")?></b></p>
                            <p><b>Comment:</b></p>
                            <p>Earlier explanation was due to scholars over-generalising from their experience of a different culture.</p>
                        </td>
                    </tr>
                </table>
            </center>

        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Question 36 – 40<br>
                Complete the sentences below:<br>
                Write ONE WORD ONLY for each answer:<br>
            </p>

            <p>36. If you look at a site from a <?= soal_isian_ielts("jawaban_listening[35]")?>, you reduce visitor pressure.</p>
            <p>37. To camp on a site may be disrespectful to people from that <?= soal_isian_ielts("jawaban_listening[36]")?></p>
            <p>38. Undiscovered material may be damaged by <?= soal_isian_ielts("jawaban_listening[37]")?></p>
            <p>39. You should avoid <?= soal_isian_ielts("jawaban_listening[38]")?> or tracing rock art it is so fragile.</p>
            <p>40. In general, your aim is to leave the site <?= soal_isian_ielts("jawaban_listening[39]")?></p>
        </div>
    </div>
<?= $this->endSection()?>

<?= $this->section('sesi-reading') ?>
    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                SECTION 1 Questions 1-15
            </p>
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="question">
                                Questions 1-3<br>
                                On the following page is a Contents page from a magazine.<br>
                                Answer question 1-3 by writing the appropriate page number or numbers where the information appears in the magazine, in boxes 1-3 in your answer sheet.
                            </p>

                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b><i>Example &emsp; : On what page is the main article in the magazine?</i></b><br>
                                        <b><i>Answer &emsp; : 5</i></b>
                                    </td>
                                </tr>
                            </table>

                            <p><b>1).</b> What page would you turn to for advice about money? <?= soal_isian_ielts("jawaban_reading[0]")?></p>
                            <p><b>2).</b> On what TWO pages can you read about art? <?= soal_isian_ielts("jawaban_reading[1]")?></p>
                            <p><b>3).</b> On what page is the new sports stadium discussed? <?= soal_isian_ielts("jawaban_reading[2]")?></p>
                            <p class="question">
                                Question 4<br>
                                Answer Question 4 by writing NO MORE THAN THREE WORDS in box 4 on your answer sheet.
                            </p>
                            <p><b>4).</b> How often does this magazine appear? <?= soal_isian_ielts("jawaban_reading[3]")?></p>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?= base_url()?>public/assets/img-soal/gt_002_1-4.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="question">
                                Questions 5-10<br><br>
                                Read the advertisements for musical concerts below and answer the questions that follow<br><br>
                                Answer the questions below by writing the appropriate letter or letters A-E in boxes 5-10 on your answer sheet. Your answer may require more than one letter.
                            </p>
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b><i>Example &emsp; : At which concert will a television character appear?</i></b><br>
                                        <b><i>Answer &emsp; : B</i></b>
                                    </td>
                                </tr>
                            </table>
                            <p><b>5)</b> At which concert will young performers play? <?= soal_isian_ielts("jawaban_reading[4]")?></p>
                            <p><b>6)</b> Which concert will be held outdoors? <?= soal_isian_ielts("jawaban_reading[5]")?></p>
                            <p><b>7)</b> Which concerts will happen more than once? <?= soal_isian_ielts("jawaban_reading[6]")?></p>
                            <p><b>8)</b> Which concert will feature only one performer? <?= soal_isian_ielts("jawaban_reading[7]")?></p>
                            <p><b>9)</b> Which concert is NOT being held at night? <?= soal_isian_ielts("jawaban_reading[8]")?></p>
                            <p><b>10)</b> At which concert can the audience choose what will be performed? <?= soal_isian_ielts("jawaban_reading[9]")?></p>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?= base_url()?>public/assets/img-soal/gt_002_5-10.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="question">
                                Questions 11-15<br><br>
                                The passage “First Aid for Snake Bites” explains what to do in the event of a snake bite.<br><br>
                                Read the additional instructions below and choose the section A-D to which each intruction belongs. Write the appropriate letter in boxes 11-15 on your answer sheet.<br>
                            </p>

                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b><i>Example &emsp; : Never use a tight bandage</i></b><br>
                                        <b><i>Answer &emsp; : D</i></b>
                                    </td>
                                </tr>
                            </table>

                            <p>11. Help the casualty to sit or lie down <?= soal_isian_ielts("jawaban_reading[10]")?></p>
                            <p>12. Wear stout shoes, walk-socks and jeans (or similar clothing) in areas where snakes could be present <?= soal_isian_ielts("jawaban_reading[11]")?></p>
                            <p>13. Pain or tightness in the chest or abdomen <?= soal_isian_ielts("jawaban_reading[12]")?></p>
                            <p>14. Do not try to catch the snake <?= soal_isian_ielts("jawaban_reading[13]")?></p>
                            <p>15. Swelling of the bitten area <?= soal_isian_ielts("jawaban_reading[14]")?></p>

                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <p class="question">
                                Questions 11-15<br>
                                Read the information below on treatment for snake bite, then answer Questions 11-15.
                            </p>
                            <img src="<?= base_url()?>public/assets/img-soal/gt_002_11-15.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $text = "
            <p><center><b>STUDENT ACCOMMODATION AT NORTHSIDE UNIVERSITY</b></center></p>
            <p class='reading-1'>Situated about 20km from the city centre, ((b))Northside University((/b)) is not easy to get to by public transport. However, students have several different alternatives for accommodation on or near the University campus.</p>
            <p class='reading-2'>Firstly, the University has several residential colleges; Burnside College, Boronia College and Helen Turner College. Each of these colleges provides a single fully furnished room with shared bathroom facilities, and meals. Burnside College is the most expensive, with 1996 fees ranging from $154 – $165 per week. However, each student room is equipped with a private telephone and voice-mailing facilities, and within the next few months, college students will have access to E-MAIL, On-Line library, INTERNET and AARNET via a network with the University. Boronia College has similar room facilities but does not offer the same computer access. It also offers only 17 meals per week, compared to Burnside’s 21. Fees vary from $147- $ 157 per week. Helen Turner College is a college exclusively for women, with similar fees to Boronia College. To attend classes, students have a short walk from the residential Colleges to the main University campus.</p>
            <p class='reading-3'>The University also provides 23 self-contained furnished townhouses. These townhouses have either 3, 4 or 6 bedrooms each and student residents are expected to be studying full-time. Rents in 1996 ranged from $54 per week for a room in a six bedroom flat to $68.50 per week for a room in a three-bedroom house. Students wanting to live in university housing should apply to the university housing officer in August of the previous year, as it is in high demand. Smoking is banned in University housing.</p>
            <p class='reading-4'>Off campus, there are many flats, townhouses and houses for rent in the local area. These can be found by looking in the local newspaper under ACCOMMODATION, or by checking notices pinned up on the boards around the university. There are always students advertising for housemates and you can even add a notice of your own to the board. However, even sharing accommodation with others can be expensive; tenants are usually required to pay a rental bond, rent in advance, and telephone/electricity/gas bills in addition to food bills. Be sure that you know what you will be required to pay before you enter into any written agreement.</p>
        ";
    ?>

    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="question">
                Section 2	Questions 16-25 <br><br>
                Read “Student Accommodation at Northside University” below and answer the questions that follow.
            </p>

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p class="question">
                                Questions 16 – 19<br><br>
                                Choose the appropriate letter A-C and write it in boxes 16-19 on your answer sheet for questions 16-19.
                            </p>

                            <?php 
                                $data_soal_16_19 = [
                                    [
                                        "no" => 16,
                                        "soal" => "The University Residential Colleges provide",
                                        "pilihan" => [
                                            "<b>A.</b> a place to live and regular classes",
                                            "<b>B.</b> regular classes only",
                                            "<b>C.</b> a place to live only."
                                        ],
                                        "name" => "jawaban_reading[15]"
                                    ],
                                    [
                                        "no" => 17,
                                        "soal" => "Smoking is",
                                        "pilihan" => [
                                            "<b>A.</b> allowed in University housing",
                                            "<b>B.</b> not allowed in University housing",
                                            "<b>C.</b> allowed only in certain areas in University housing."
                                        ],
                                        "name" => "jawaban_reading[16]"
                                    ],
                                    [
                                        "no" => 18,
                                        "soal" => "University townhouses are available for",
                                        "pilihan" => [
                                            "<b>A.</b> full-time students only",
                                            "<b>B.</b> part-time students only",
                                            "<b>C.</b> all students."
                                        ],
                                        "name" => "jawaban_reading[17]"
                                    ],
                                    [
                                        "no" => 19,
                                        "soal" => "Accommodation in the area surrounding the university is",
                                        "pilihan" => [
                                            "<b>A.</b> scarce",
                                            "<b>B.</b> plentiful",
                                            "<b>C.</b> scarce and expensive."
                                        ],
                                        "name" => "jawaban_reading[18]"
                                    ],
                                ]
                            ?>

                            <?php foreach ($data_soal_16_19 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal)?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $text = "
            <p><center><b>STUDENT ACCOMMODATION AT NORTHSIDE UNIVERSITY</b></center></p>
            <p class='reading-5'>Situated about 20km from the city centre, ((b))Northside University((/b)) is not easy to get to by public transport. However, students have several different alternatives for accommodation on or near the University campus.</p>
            <p class='reading-6'>Firstly, the University has several residential colleges; Burnside College, Boronia College and Helen Turner College. Each of these colleges provides a single fully furnished room with shared bathroom facilities, and meals. Burnside College is the most expensive, with 1996 fees ranging from $154 – $165 per week. However, each student room is equipped with a private telephone and voice-mailing facilities, and within the next few months, college students will have access to E-MAIL, On-Line library, INTERNET and AARNET via a network with the University. Boronia College has similar room facilities but does not offer the same computer access. It also offers only 17 meals per week, compared to Burnside’s 21. Fees vary from $147- $ 157 per week. Helen Turner College is a college exclusively for women, with similar fees to Boronia College. To attend classes, students have a short walk from the residential Colleges to the main University campus.</p>
            <p class='reading-7'>The University also provides 23 self-contained furnished townhouses. These townhouses have either 3, 4 or 6 bedrooms each and student residents are expected to be studying full-time. Rents in 1996 ranged from $54 per week for a room in a six bedroom flat to $68.50 per week for a room in a three-bedroom house. Students wanting to live in university housing should apply to the university housing officer in August of the previous year, as it is in high demand. Smoking is banned in University housing.</p>
            <p class='reading-8'>Off campus, there are many flats, townhouses and houses for rent in the local area. These can be found by looking in the local newspaper under ACCOMMODATION, or by checking notices pinned up on the boards around the university. There are always students advertising for housemates and you can even add a notice of your own to the board. However, even sharing accommodation with others can be expensive; tenants are usually required to pay a rental bond, rent in advance, and telephone/electricity/gas bills in addition to food bills. Be sure that you know what you will be required to pay before you enter into any written agreement.</p>
        ";
    ?>

    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="question">
                Section 2	Questions 16-25 <br><br>
                Read “Student Accommodation at Northside University” below and answer the questions that follow.
            </p>

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p class="question">
                                Questions 20 – 25<br><br>
                                Complete the following sentences with information from the passage "Student Accommodation at Northside University".<br><br>
                                Write your answers in boxes 20-25 on your answer sheet. No more than two words and/ or a number.
                            </p>
                            <p>
                                A student living in a 3-bedroom University townhouse would pay (20)<?= soal_isian_ielts("jawaban_reading[19]")?> per week for a room; in comparison, the cheapest accommodation available at Burnside College is (21)<?= soal_isian_ielts("jawaban_reading[20]")?> per week. The fee charged at Burnside College includes (22)<?= soal_isian_ielts("jawaban_reading[21]")?> meals per week, but at Boronia College only (23)<?= soal_isian_ielts("jawaban_reading[22]")?> meals per week are included in the fee. Helen Turner College has a similar fee structure to (24)<?= soal_isian_ielts("jawaban_reading[23]")?> College, but only (25)<?= soal_isian_ielts("jawaban_reading[24]")?> may live there.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $text = "
        <p><b>Section A</b></p>
        <p class='reading-9'>Kormilda College is a unique school situated near Darwin in Australia’s Northern Territory. For 20 years, to 1989, Kormilda College operated as a government-run, live-in school for high school Aboriginal students. In 1989 it was bought from the Government by two Christian church groups and since then it has expanded enormously, to include a day school as well as boarders (residential students) in Years 8-12. Although 320 pupils of the College’s total number are Aboriginal students, drawn mainly from isolated communities across the Northern Territory, Kormilda also has a waiting list of non–aboriginal students. With a current enrolment of 600, student numbers are expected to grow to 860 by 1999.</p>

        <p><b>Section B</b></p>
        <p class='reading-10'>Central to the mission of the school is the encouragement of individual excellence, which has resulted in programs designed especially for the student population. Specialist support programs allow’ traditional Aboriginal students, who are often second language users, to understand and succeed in the mainstream curriculum. A Gifted and Talented Program, including a special Aboriginal and Torres Strait Islander Tertiary Aspirations program, has been introduced, as has an Adaptive Education Unit. Moreover, in Years 11 and 12, students may choose to follow the standard Northern Territory Courses or those of the International Baccalaureate (I.B.).</p>
        
        <p><b>Section C</b></p>
        <p class='reading-11'>To provide appropriate pastoral care, as well as a suitable academic structure, three distinct sub-schools have been established.</p>
        <p class='reading-12'>◼((u))Pre-Secondary((/u)) : For Aboriginal and Torres Strait Islander students in Years 8-10 who are of secondary school age but have difficulties reading and writing.</p>
        <p class='reading-13'>◼((u))Supported Secondary((/u)) : For Aboriginal and Torres Strait Islander students who are of secondary school age and operating at secondary school year levels 8-12 who need specific second language literacy and numeracy support.</p>
        <p class='reading-14'>◼((u))Secondary((/u)) : For multi-cultural Years 8-12 students.</p>
        <p class='reading-15'>Students remain in their sub-schools for classes in the main subject areas of English, Maths, Social Education and Science. This arrangement takes into account both diverse levels of literacy and the styles of learning and cultural understandings appropriate to traditional Aboriginal second-language users. In elective subjects chosen by the students – which include Indonesian, Music, Art, Drama, Science for Life, Commerce, Geography, Modem History, Woodwork, Metal Work, Economics and Legal Studies – students mix on the basis of subject interest.</p>

        <p><b>Section D</b></p>
        <p class='reading-16'>To aid the development of the Aboriginal Education program, a specialist curriculum Support Unit has been set up. One of its functions is to re-package school courses so that they can be taught in ways that suit the students.</p>
        <p class='reading-17'>The education program offered to Aboriginal students uses an approach which begins with the students’ own experiences and gradually builds bi-cultural understanding. In one course, “Introducing Western European Culture Through Traditional Story-Telling”, students are helped to build a common base for approaching the English literature curriculum. Drawing on the oral culture of traditional Aboriginal communities, they are introduced to traditional stories of other cultures, both oral and written. In a foundational Year 10 course, “Theory of Learning”, concepts from Aboriginal culture are placed side by side with European concepts so that students can use their own knowledge base to help bridge the cultural divide.</p>
        <p class='reading-18'>Another project of the Support Unit has been the publication of several books, the most popular, Korniihla Capers. The idea for Kormilda Capers came about when it became obvious that there was a lack of engaging material for the school’s teenage readers. One of the stories in the book, “The Bulman Mob hits the Big Smoke”, recounts the adventures of Kormilda pupils on their first visit to Sydney, Canberra and the snow country. Focussing on experiences which have directly affected the lives of students at the College, and on ideas and issues which are of immediate interest to Aboriginal students, Kormilda Capers has earned enthusiastic support within and outside the school.</p>
        "
    ?>

    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="question">
                Section 3	Questions 26-40 <br><br>
                Read the passage below and answer the questions 26-40 that follow.
            </p>

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p class='question'>
                                Questions 26 – 27<br><br>
                                Complete the following sentences with A NUMBER OR DATE from the passage.<br><br>
                                Write your answers in boxes 26-27 on your answer sheet.
                            </p>

                            <p>26. Kormilda College opened as a school in <?= soal_isian_ielts("jawaban_reading[25]")?><p>
                            <p>27. At the time of writing there were <?= soal_isian_ielts("jawaban_reading[26]")?> non-aboriginal students at Kormilda College.</p>

                            <p class="question">
                                Question 28<br><br>
                                From the list below, choose the best heading for Section B of the reading passage.<br><br>
                                Write the appropriate letter A-D in box 28 on pour answer sheet.
                            </p>

                            <p><b>A</b> Specialist teaching and teachers at Kormilda College</p>
                            <p><b>B</b> Special Programmes at Kormilda College for Aboriginal students</p>
                            <p><b>C</b> The new look Kormilda College</p>
                            <p><b>D</b> Programmes at Kormilda College to promote individual excellence</p>

                            <p>28.<?= soal_isian_ielts("jawaban_reading[27]")?><p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $text = "
        <p><b>Section A</b></p>
        <p class='reading-19'>Kormilda College is a unique school situated near Darwin in Australia’s Northern Territory. For 20 years, to 1989, Kormilda College operated as a government-run, live-in school for high school Aboriginal students. In 1989 it was bought from the Government by two Christian church groups and since then it has expanded enormously, to include a day school as well as boarders (residential students) in Years 8-12. Although 320 pupils of the College’s total number are Aboriginal students, drawn mainly from isolated communities across the Northern Territory, Kormilda also has a waiting list of non–aboriginal students. With a current enrolment of 600, student numbers are expected to grow to 860 by 1999.</p>

        <p><b>Section B</b></p>
        <p class='reading-20'>Central to the mission of the school is the encouragement of individual excellence, which has resulted in programs designed especially for the student population. Specialist support programs allow’ traditional Aboriginal students, who are often second language users, to understand and succeed in the mainstream curriculum. A Gifted and Talented Program, including a special Aboriginal and Torres Strait Islander Tertiary Aspirations program, has been introduced, as has an Adaptive Education Unit. Moreover, in Years 11 and 12, students may choose to follow the standard Northern Territory Courses or those of the International Baccalaureate (I.B.).</p>
        
        <p><b>Section C</b></p>
        <p class='reading-21'>To provide appropriate pastoral care, as well as a suitable academic structure, three distinct sub-schools have been established.</p>
        <p class='reading-22'>◼((u))Pre-Secondary((/u)) : For Aboriginal and Torres Strait Islander students in Years 8-10 who are of secondary school age but have difficulties reading and writing.</p>
        <p class='reading-23'>◼((u))Supported Secondary((/u)) : For Aboriginal and Torres Strait Islander students who are of secondary school age and operating at secondary school year levels 8-12 who need specific second language literacy and numeracy support.</p>
        <p class='reading-24'>◼((u))Secondary((/u)) : For multi-cultural Years 8-12 students.</p>
        <p class='reading-25'>Students remain in their sub-schools for classes in the main subject areas of English, Maths, Social Education and Science. This arrangement takes into account both diverse levels of literacy and the styles of learning and cultural understandings appropriate to traditional Aboriginal second-language users. In elective subjects chosen by the students – which include Indonesian, Music, Art, Drama, Science for Life, Commerce, Geography, Modem History, Woodwork, Metal Work, Economics and Legal Studies – students mix on the basis of subject interest.</p>

        <p><b>Section D</b></p>
        <p class='reading-26'>To aid the development of the Aboriginal Education program, a specialist curriculum Support Unit has been set up. One of its functions is to re-package school courses so that they can be taught in ways that suit the students.</p>
        <p class='reading-27'>The education program offered to Aboriginal students uses an approach which begins with the students’ own experiences and gradually builds bi-cultural understanding. In one course, “Introducing Western European Culture Through Traditional Story-Telling”, students are helped to build a common base for approaching the English literature curriculum. Drawing on the oral culture of traditional Aboriginal communities, they are introduced to traditional stories of other cultures, both oral and written. In a foundational Year 10 course, “Theory of Learning”, concepts from Aboriginal culture are placed side by side with European concepts so that students can use their own knowledge base to help bridge the cultural divide.</p>
        <p class='reading-28'>Another project of the Support Unit has been the publication of several books, the most popular, Korniihla Capers. The idea for Kormilda Capers came about when it became obvious that there was a lack of engaging material for the school’s teenage readers. One of the stories in the book, “The Bulman Mob hits the Big Smoke”, recounts the adventures of Kormilda pupils on their first visit to Sydney, Canberra and the snow country. Focussing on experiences which have directly affected the lives of students at the College, and on ideas and issues which are of immediate interest to Aboriginal students, Kormilda Capers has earned enthusiastic support within and outside the school.</p>
        "
    ?>

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p class="question">
                                Questions 29 – 33<br><br>
                                The following diagram shows how Kormilda College is organised. Complete the diagram using information from the text.<br><br>
                                Use NO MORE THAN THREE WORDS for each answer.<br><br>
                                Write your answers in boxes 29-33 on your answer sheet.
                            </p>

                            <img src="<?= base_url()?>public/assets/img-soal/gt_002_29-33.png" alt="" class="img-fluid">

                            <p>29.<?= soal_isian_ielts("jawaban_reading[28]")?><p>
                            <p>30.<?= soal_isian_ielts("jawaban_reading[29]")?><p>
                            <p>31.<?= soal_isian_ielts("jawaban_reading[30]")?><p>
                            <p>32.<?= soal_isian_ielts("jawaban_reading[31]")?><p>
                            <p>33.<?= soal_isian_ielts("jawaban_reading[32]")?><p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $text = "
        <p><b>Section A</b></p>
        <p class='reading-29'>Kormilda College is a unique school situated near Darwin in Australia’s Northern Territory. For 20 years, to 1989, Kormilda College operated as a government-run, live-in school for high school Aboriginal students. In 1989 it was bought from the Government by two Christian church groups and since then it has expanded enormously, to include a day school as well as boarders (residential students) in Years 8-12. Although 320 pupils of the College’s total number are Aboriginal students, drawn mainly from isolated communities across the Northern Territory, Kormilda also has a waiting list of non–aboriginal students. With a current enrolment of 600, student numbers are expected to grow to 860 by 1999.</p>

        <p><b>Section B</b></p>
        <p class='reading-30'>Central to the mission of the school is the encouragement of individual excellence, which has resulted in programs designed especially for the student population. Specialist support programs allow’ traditional Aboriginal students, who are often second language users, to understand and succeed in the mainstream curriculum. A Gifted and Talented Program, including a special Aboriginal and Torres Strait Islander Tertiary Aspirations program, has been introduced, as has an Adaptive Education Unit. Moreover, in Years 11 and 12, students may choose to follow the standard Northern Territory Courses or those of the International Baccalaureate (I.B.).</p>
        
        <p><b>Section C</b></p>
        <p class='reading-31'>To provide appropriate pastoral care, as well as a suitable academic structure, three distinct sub-schools have been established.</p>
        <p class='reading-32'>◼((u))Pre-Secondary((/u)) : For Aboriginal and Torres Strait Islander students in Years 8-10 who are of secondary school age but have difficulties reading and writing.</p>
        <p class='reading-33'>◼((u))Supported Secondary((/u)) : For Aboriginal and Torres Strait Islander students who are of secondary school age and operating at secondary school year levels 8-12 who need specific second language literacy and numeracy support.</p>
        <p class='reading-34'>◼((u))Secondary((/u)) : For multi-cultural Years 8-12 students.</p>
        <p class='reading-35'>Students remain in their sub-schools for classes in the main subject areas of English, Maths, Social Education and Science. This arrangement takes into account both diverse levels of literacy and the styles of learning and cultural understandings appropriate to traditional Aboriginal second-language users. In elective subjects chosen by the students – which include Indonesian, Music, Art, Drama, Science for Life, Commerce, Geography, Modem History, Woodwork, Metal Work, Economics and Legal Studies – students mix on the basis of subject interest.</p>

        <p><b>Section D</b></p>
        <p class='reading-36'>To aid the development of the Aboriginal Education program, a specialist curriculum Support Unit has been set up. One of its functions is to re-package school courses so that they can be taught in ways that suit the students.</p>
        <p class='reading-37'>The education program offered to Aboriginal students uses an approach which begins with the students’ own experiences and gradually builds bi-cultural understanding. In one course, “Introducing Western European Culture Through Traditional Story-Telling”, students are helped to build a common base for approaching the English literature curriculum. Drawing on the oral culture of traditional Aboriginal communities, they are introduced to traditional stories of other cultures, both oral and written. In a foundational Year 10 course, “Theory of Learning”, concepts from Aboriginal culture are placed side by side with European concepts so that students can use their own knowledge base to help bridge the cultural divide.</p>
        <p class='reading-38'>Another project of the Support Unit has been the publication of several books, the most popular, Korniihla Capers. The idea for Kormilda Capers came about when it became obvious that there was a lack of engaging material for the school’s teenage readers. One of the stories in the book, “The Bulman Mob hits the Big Smoke”, recounts the adventures of Kormilda pupils on their first visit to Sydney, Canberra and the snow country. Focussing on experiences which have directly affected the lives of students at the College, and on ideas and issues which are of immediate interest to Aboriginal students, Kormilda Capers has earned enthusiastic support within and outside the school.</p>
        "
    ?>

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p class="question">
                                Questions 34 – 40<br><br>
                                Read the passage about Kormilda College and look at the statements below.<br><br>
                                In boxes 34 – 40 on pour answer sheet write:<br><br>
                            </p>
                            
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b>TRUE</b>     if the statement is true
                                        <b>FALSE</b>   if the statement is not true
                                        <b>NOT GIVEN</b>   if the information is not given in the passage
                                    </td>
                                </tr>
                            </table>

                            <?php
                                $data_soal_34_40 = [
                                    [
                                        "no" => 34,
                                        "soal" => "Kormilda College educates both Aboriginal and non-Aboriginal students.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[33]"
                                    ],
                                    [
                                        "no" => 35,
                                        "soal" => "Some students travel from Arnhem Land to attend Kormilda College.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[34]"
                                    ],
                                    [
                                        "no" => 36,
                                        "soal" => "Students must study both the International Baccalaureate and Northern Territory courses.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[35]"
                                    ],
                                    [
                                        "no" => 37,
                                        "soal" => "The Pre-Secondary School attracts the best teachers.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[36]"
                                    ],
                                    [
                                        "no" => 38,
                                        "soal" => "The specialist curriculum Support Unit adapts school courses so the students can approach them more easily.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[37]"
                                    ],
                                    [
                                        "no" => 39,
                                        "soal" => "There are no oral traditional stories in Western communities.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[38]"
                                    ],
                                    [
                                        "no" => 40,
                                        "soal" => "The school helps the students make connections between Aboriginal and non-Aboriginal cultures.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[39]"
                                    ],
                                ];
                            ?>

                                <?php foreach ($data_soal_34_40 as $data_soal) :?>
                                    <?= soal_pg_ielts($data_soal);?>
                                <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection()?>

<?= $this->section('sesi-writing') ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="question mb-3">
                        Writing Task 1<br>
                        You should spend about 20 minutes on this task.
                    </p>
        
                    <p>You have a penfriend living in another country and he/she is curious to know about the major news items in your country.</p>
                    <p>Briefly describe ONE news story that has been on TV, onl the radio, or in the newspapers in your country, and explain why people are interested in it.</p>
                    <p>You should write at least 150 words.</p>
                    <p>You do NOT need to write your own address. Begin your letter as follows:</p>
                    <p>Dear _______,</p>
                </div>

                <div class="col-6">
                    <span>Type your answer here</span>
                    <textarea id="textarea-1" class="form-control mb-3" name="text_writing[0]" data-bs-toggle="autosize" placeholder="" style="height: 300px;"></textarea>
                    <center>Total word Count : <span id="count-textarea-1">0</span></center>

                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="question mb-3">
                        Writing Task 2<br>
                        You should spend about 40 minutes on this task.
                    </p>
        
                    <p>As part of a class assignment you have to write about the following topic.</p>
                    <p>A healthy person is often described as someone who has a good diet, gets lots of exercise, and avoids stress.</p>
                    <p>What do people do to stay healthy in your country?</p>
                    <p>You should write at least 250 words.</p>
                </div>

                <div class="col-6">
                    <span>Type your answer here</span>
                    <textarea id="textarea-2" class="form-control mb-3" name="text_writing[1]" data-bs-toggle="autosize" placeholder="" style="height: 300px;"></textarea>
                    <center>Total word Count : <span id="count-textarea-2">0</span></center>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection()?>