<?= $this->extend('pages/soal/layout/soal_layout') ?>

<?= $this->section('sesi-listening') ?>
    <div class="card mb-3">
        <div class="card-body">
            <center>
                <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('public/assets/myaudio/transforme/gt-03/gt-03.mp3?t='.time())?>" type="audio/mpeg"></audio>
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
            <p>
                    Questions 1-5 <br>
                    <i>Complete the notes below</i> <br>
                    <i>Write <b>NO MORE THAN THREE WORDS</b> for each answer.</i><br>
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
                            <p>&emsp;&emsp; - $15 single, $27,50 return</p>
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
            </p>
            <p>
                <i>Complete the booking from below:</i><br>
                <i>Write <b>ONE WORD ANDIOR A NUMBER</b> for each answer:</i><br>
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
                            <p><b>Address in Milton :</b>&emsp;&emsp;Vacation Motel, <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;24, Kitchener Street</p>
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
            <p>
                <b>Questions 11 – 16</b><br>
                <i>Choose the correct letter <b>A</b>, <b>B</b>, or <b>C</b></i>
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
            </p>
            <p>
                What does the speaker say about the following items? <br>
                <i>Write the correct letter: <b>A</b>, <b>B</b> or <b>C</b> next to question <b>17 – 20</b></i> <br>
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
            </p>
            <p>
                <i>Complete the notes below</i><br>
                <i>Write <b>ONE WORD ONLY</b> for each answer:</i><br>
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
            </p>
            <p>
                <i>Choose the correct letter <b>A</b>, <b>B</b> or <b>C</b></i>
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
            </p>
            <p>
                <i>Complete the sentences below.</i><br>
                <i>Write <b>ONE WORD ONLY</b> for each answer.</i><br>
            </p>
            <p>28. All managers need to understand their employees and recognize their company’s <?= soal_isian_ielts("jawaban_listening[27]")?></p>
            <p>29. When managing change, increasing the company’s <?= soal_isian_ielts("jawaban_listening[28]")?> may be more important than employee satisfaction.</p>
            <p>30. During periods of change, managers may have to cope with increased amounts of <?= soal_isian_ielts("jawaban_listening[29]")?></p>

        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                SECTION 4	Questions 31 – 40
            </p>
            <p>
                <b>Questions 31 – 35</b> <br>
                <i>Complete the notes below.</i> <br>
                <i>Write <b>ONE WORD ONLY</b> for each answer.</i>
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
            </p>
            <p>
                <i>Complete the sentences below.</i><br>
                <i>Write <b>ONE WORD ONLY</b> for each answer.</i><br>
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
    <?php
        $text_1 = "
            <p><center><b>EASTERN ENERGY</b></center></p>
            <p class='reading-1'>We are here to help and provide you with personal advice on any matters connected with your bill or any other queries regarding your gas and electricity supply.</p>
            <p class='reading-2'>
                ((b))Moving home((/b))((br))
                Please give as much notice as possible if you are moving home, but at least 48 hours is required for us to make the necessary arrangements for your gas and electricity supply. Please telephone our 24-hour line on 01316 753219 with details of your move. In most cases, we are happy to accept your metre reading on the day you move. Tell the new occupant that Eastern Energy supplies the household, to ensure the service is not interrupted. Remember we can now supply electricity and gas at your new address, anywhere in the UK. If you do not contact us, you may be held responsible for the payment for electricity used after you have moved.
            </p>
            <p class='reading-3'>
                ((b))Metre reading((/b))((br))
                Eastern Energy uses various types of metres ranging from the traditional dial metre to new technology digital display metres. Always read the metre from left to right, ignoring any red dials. If you require assistance, contact our 24-hour line on 0600 7310 310.
            </p>
            <p class='reading-4'>
                ((b))Energy Efficiency Line((/b))((br))
                If you would like advice on the efficient use of energy, please call our Energy Efficiency Line on 0995 7626 513. Please do not use this number for any other enquiries.
            </p>
            <p class='reading-5'>
                ((b))Special services((/b))((br))
                Passwords - you can choose a password so that, whenever we visit you at home, you will know it is us. For more information, ring our helpline on 0995 7290 290.
            </p>
            <p class='reading-6'>
                ((b))Help and advice((/b))((br))
                If you need help or advice with any issues, please contact us on 01316 440188.
            </p>
            <p class='reading-7'>
                ((b))Complaints((/b))((br))
                We hope you will never have a problem or cause to complain, but, if you do, please contact our complaints handling team at PO Box 220, Stanfield, ST55 6GF or telephone us on 01316 753270.
            </p>
            <p class='reading-8'>
                ((b))Supply failure((/b))((br))
                If you experience any problems with your electricity supply, please call free on 0600 7838 836, 24 hours a day, seven days a week.
            </p>
        ";

        $text_2 = "
            <p><center><b><u>USING YOUR NEW MICROWAVE OVEN</u></b></center></p>
            <p><center>Some important points to note</center></p>
            <p class='reading-10'>
                ((b))A.((/b)) As microwave cooking times are much shorter than other cooking times, it is essential that recommended cooking times are not exceeded without first checking the food.
            </p>
            <p class='reading-11'>
                ((b))B.((/b)) Take care when heating small amounts of food as these can easily burn, dry out or catch fire if cooked too long. Always set short cooking times and check the food frequently.
            </p>
            <p class='reading-12'>
                ((b))C.((/b)) Take care when heating 'dry' foods, e.g. bread items, chocolate and pastries. These can easily burn or catch fire if cooked too long.
            </p>
            <p class='reading-13'>
                ((b))D.((/b)) Some processed meats, such as sausages, have non-porous casings. These must be pierced by a fork before cooking, to prevent bursting. Whole fruit and vegetables should be similarly treated.
            </p>
            <p class='reading-14'>
                ((b))E.((/b)) When heating soup, sauces and beverages in your microwave oven, heating beyond the boiling point can occur without evidence of bubbling. Care should be taken not to overheat.
            </p>
            <p class='reading-15'>
                ((b))F.((/b)) When warming up food for a second time, it is essential that it is served 'piping hot’, i.e. steam is being emitted from all parts and any sauce is bubbling. For foods that cannot be stirred, e.g. pizza, the centre should be cut with a knife to test if it is well heated through.
            </p>
            <p class='reading-16'>
                ((b))G.((/b)) It is important for the safe operation of the oven that it is wiped out regularly. Use warm, soapy water, squeeze the cloth out well and use it to remove any grease or food from the interior. The oven should be unplugged during this process.
            </p>
        ";

        $text_3 = "
            <p><center><b>CHOOSING PREMISES FOR A NEW BUSINESS</b></center></p>
            <p class='reading-18'>
                ((b))What you need((/b))((br))
                Three factors dominate the priorities of small businesses looking for premises: cost, cost and cost. Nobody ever has enough money, so there is an overwhelming temptation to go for the cheapest property. It is a mistake that can take decades to rectify - and even threaten the future of a promising business.((br))
                Ironically some firms swing too far in the other direction, committing themselves to a heavy initial outlay because they believe in the importance of image - and that does not come cheap. Finding the right premises is the real secret. That can, and will, vary enormously according to the type of business. But there are some general rules that apply to any operation.
            </p>
            <p class='reading-19'>
                ((b))Location((/b))((br))
                High street premises are important for shops which rely on passing trade - but these are expensive. Rents fall quickly within a few metres of main roads. Offices, however, need not be located centrally, particularly if most business is done on the phone or via email.((br))
                Manufacturing and storage relies heavily on access. Think about how vans and lorries will deliver and collect goods from the premises. Nearby parking can be important for staff, and public transport can be even more so, as traffic restrictions tighten.
            </p>
            <p class='reading-20'>
                ((b))Size((/b))((br))
                This is a crucial decision. Health and Safety laws provide basic guidance on how much room is required per office desk or manufacturing operation. But remember to allow for growth.
            </p>
            <p class='reading-21'>
                ((b))Growth((/b))((br))
                Every small business aims to become a big business, but this prospect can be obstructed if the wrong decisions are made early on. It is important to consider flexibility from the start. Can a building be physically altered internally by knocking down walls or by extending outwards or adding extra floors? Is there spare land next door to expand later if necessary?
            </p>
            <p class='reading-22'>
                Landlords obviously have to agree to any changes so it is important that the contract includes details of what will be allowed and how much extra will be charged on top of the costs of rebuilding or alteration. Planning rules must also be considered. Local authorities are not always open to discussion about the future of premises. They may have rigid rules about increasing density of development. The building may be in a conservation area or near housing, in which case it will be much more difficult to consider changes.
            </p>
        ";

        $text_4 = "
            <p><center><b>CALIFORNIA STATE COLLEGE</b><br>WORKING CONDITIONS AND BENEFITS FOR EMPLOYEES</b></center></p>
            <p class='reading-23'>
                ((b))Payday((/b))((br))
                Employees are paid every other Friday. If Friday is a holiday, payday will be the following Monday. Generally, employees pick up the pay checks in their department; if not, they may be picked up at the Business Office.
            </p>
            <p class='reading-24'>
                ((b))Overtime((/b))((br))
                All time worked over eight hours in one day and forty hours in a workweek, and also the first eight hours worked on the seventh day of work in a workweek is considered overtime for non-exempt employees. The supervisor must approve all overtime before overtime occurs. Hours in excess of eight hours on the seventh day and in excess of twelve hours in one day will be paid at double time. Exempt employees receive no additional compensation for overtime hours.
            </p>
            <p class='reading-25'>
                ((b))Parking((/b))((br))
                All employees who will be parking in a staff parking zone must obtain a parking permit. A monthly pre-tax payroll deduction can be made by visiting Human Resources. If you wish to pay cash, present your staff I.D. and license number to the Cashier's Office. The Safety Department will ticket cars without a parking permit and a fine will be applied.
            </p>
            <p class='reading-26'>
                ((b))I.D. Card((/b))((br))
                All employees are required to carry an I.D. card. If an employee loses his/her card, there will be an automatic charge of $5.00 to issue a duplicate. If an employee gives up employment, his/her I.D. card must be returned prior to the release of the final paycheck.
            </p>
            <p class='reading-27'>
                ((b))Holidays((/b))((br))
                All regular and temporary full-time employees generally receive approximately 13 paid holidays during the course of each calendar year. Regular part-time employees will receive holiday benefits worked out using a prorated system. The holiday schedule is initiated annually.
            </p>
            <p class='reading-28'>
                ((b))Personal Holiday((/b))((br))
                Each employee is granted one extra day as a Personal Holiday at the time of hire, and at the beginning of each calendar year, Personal Holiday hours must be taken at one time (eight hours full-time or prorated based on the employee's time). Employees requesting Personal Holiday will be required to complete ‘Leave Request’ forms. No more than one Personal Holiday is authorized annually.
            </p>
            <p class='reading-29'>
                ((b))Birthday Holiday((/b))((br))
                All regular and temporary full-time or part-time employees are entitled to take their birthday off with pay. An employee has a fifteen-day span before and following his/her birthday to take the paid day off. What is known as a grace period through January 15th is given to those employees whose birthdays fall between December 16th and the end of the year.
            </p>
        ";

        $text_5 = "
            <p><center><b>A VERY SPECIAL DOG</b><br><i>Florence is one of a new breed of dog who is making the work of the Australian Customs much easier.</i></center></p>
            <p class='reading-30'>
                It is 8.15 a.m. A flight lands at Melbourne's Tullamarine International Airport. Several hundred pieces of baggage are rushed from the plane onto a conveyor belt in the baggage reclaim annexe. Over the sound of roaring engines, rushing air vents and grinding generators, a dog barks. Florence, a sleek black labrador, wags her tail.
            </p>
            <p class='reading-31'>
                Among the cavalcade of luggage passing beneath Florence's all-smelling nose, is a nondescript hardback suitcase. Inside the case, within styrofoam casing, packed in loose pepper and coffee, wrapped in freezer paper and heat-sealed in plastic, are 18 kilograms of hashish.
            </p>
            <p class='reading-32'>
                The cleverly concealed drugs don't fool super-sniffer Florence, and her persistent scratching at the case alerts her handler. Florence is one of a truly new breed: the product of what is perhaps the only project in the world dedicated to breeding dogs solely to detect drugs. Ordinary dogs have a 0.1% chance of making it in drug detection. The new breeding programme, run by the Australian Customs, is so successful that more than 50% of its dogs make the grade.
            </p>
            <p class='reading-33'>
                And what began as a wholly practical exercise in keeping illegal drugs out of Australia may end up playing a role in an entirely different sphere - the comparatively esoteric world of neurobiology. It turns out that it's not Florence's nose that makes her a top drug dog, but her unswerving concentration, plus a few other essential traits. Florence could help neurobiologists to understand both what they call 'attention processing', the brain mechanisms that determine what a person pays attention to and for how long, and its flip side, problems such as Attention Deficit/Hyperactivity Disorder (ADHD). As many as 3 to 5% of children are thought to suffer from the condition in the US, where the incidence is highest, although diagnosis is often controversial.
            </p>
            <p class='reading-34'>
                The Australian Customs has used dogs to find drugs since 1969. Traditionally, the animals came from pounds and private breeders. But, in 1993, fed up with the poor success rate of finding good dogs this way, John Vandeloo, senior instructor with the Detector Dog Unit, joined forces with Kath Champness, then a doctoral student at the University of Melbourne, and set up a breeding programme.
            </p>
            <p class='reading-35'>
                Champness began by defining six essential traits that make a detector dog. First, every good detector dog must love praise because this is the only tool trainers have at their disposal, but the dog must still be able to work for long periods without it. Then it needs a strong hunting instinct and the stamina to keep sniffing at the taxing rate of around 300 times per minute. The ideal detector is also fearless enough to deal with jam-packed airport crowds and the roaring engine rooms of cargo ships.
            </p>
            <p class='reading-36'>
                The remaining two traits are closely related and cognitive in nature. A good detector must be capable of focusing on the task of searching for drugs, despite the distractions in any airport or dockside. This is what neurobiologists call 'selective attention'. And finally, with potentially tens of thousands of hiding places for drugs, the dog must persevere and maintain focus for hours at a time. Neurobiologists call this 'sustained attention'.
            </p>
            <p class='reading-37'>
                Vandeloo and Champness assess the dogs' abilities to concentrate by marking them on a scale of between one and five according to how well they remain focused on a toy tossed into a patch of grass. Ivan scores a feeble one. He follows the toy, gets half-way there, then becomes distracted by places where the other dogs have been or by flowers in the paddock. Rowena, on the other hand, has phenomenal concentration; some might even consider her obsessive. When Vandeloo tosses the toy, nothing can distract her from the searching, not other dogs, not food. And even if no one is around to encourage her, she keeps looking just the same. Rowena gets a five.
            </p>
            <p class='reading-38'>
                A person's ability to pay attention, like a dog's, depends on a number of overlapping cognitive behaviours, including memory and learning - the neurobiologist's attention processing. Attention in humans can be tested by asking subjects to spot colours on a screen while ignoring shapes, or to spot sounds while ignoring visual cues, or to take a 'vigilance test'. Sitting a vigilance test is like being a military radar operator. Blips appear on a cluttered monitor infrequently and at irregular intervals. Rapid detection of all blips earns a high score. Five minutes into the test, one in ten subjects will start to miss the majority of the blips, one in ten will still be able to spot nearly all of them and the rest will come somewhere in between.
            </p>
            <p class='reading-39'>
                Vigilance tasks provide signals that are infrequent and unpredictable - which is exactly what is expected of the dogs when they are asked to notice just a few odour molecules in the air, and then to home in on the source. During a routine mail screen that can take hours, the dogs stay so focused that not even a postcard lined with 0.5 grams of heroin and hidden in a bulging sack of letters escapes detection.
            </p>
            <p class='reading-40'>
                With the current interest in attentional processing, as well as human conditions that have an attention deficit component, such as ADHD, it is predicted that it is only a matter of time before the super-sniffer dogs attract the attention of neurobiologists trying to cure these conditions.
            </p>
        ";

        $text_6 = "
            <p><center><b>A VERY SPECIAL DOG</b><br><i>Florence is one of a new breed of dog who is making the work of the Australian Customs much easier.</i></center></p>
            <p class='reading-41'>
                It is 8.15 a.m. A flight lands at Melbourne's Tullamarine International Airport. Several hundred pieces of baggage are rushed from the plane onto a conveyor belt in the baggage reclaim annexe. Over the sound of roaring engines, rushing air vents and grinding generators, a dog barks. Florence, a sleek black labrador, wags her tail.
            </p>
            <p class='reading-42'>
                Among the cavalcade of luggage passing beneath Florence's all-smelling nose, is a nondescript hardback suitcase. Inside the case, within styrofoam casing, packed in loose pepper and coffee, wrapped in freezer paper and heat-sealed in plastic, are 18 kilograms of hashish.
            </p>
            <p class='reading-43'>
                The cleverly concealed drugs don't fool super-sniffer Florence, and her persistent scratching at the case alerts her handler. Florence is one of a truly new breed: the product of what is perhaps the only project in the world dedicated to breeding dogs solely to detect drugs. Ordinary dogs have a 0.1% chance of making it in drug detection. The new breeding programme, run by the Australian Customs, is so successful that more than 50% of its dogs make the grade.
            </p>
            <p class='reading-44'>
                And what began as a wholly practical exercise in keeping illegal drugs out of Australia may end up playing a role in an entirely different sphere - the comparatively esoteric world of neurobiology. It turns out that it's not Florence's nose that makes her a top drug dog, but her unswerving concentration, plus a few other essential traits. Florence could help neurobiologists to understand both what they call 'attention processing', the brain mechanisms that determine what a person pays attention to and for how long, and its flip side, problems such as Attention Deficit/Hyperactivity Disorder (ADHD). As many as 3 to 5% of children are thought to suffer from the condition in the US, where the incidence is highest, although diagnosis is often controversial.
            </p>
            <p class='reading-45'>
                The Australian Customs has used dogs to find drugs since 1969. Traditionally, the animals came from pounds and private breeders. But, in 1993, fed up with the poor success rate of finding good dogs this way, John Vandeloo, senior instructor with the Detector Dog Unit, joined forces with Kath Champness, then a doctoral student at the University of Melbourne, and set up a breeding programme.
            </p>
            <p class='reading-46'>
                Champness began by defining six essential traits that make a detector dog. First, every good detector dog must love praise because this is the only tool trainers have at their disposal, but the dog must still be able to work for long periods without it. Then it needs a strong hunting instinct and the stamina to keep sniffing at the taxing rate of around 300 times per minute. The ideal detector is also fearless enough to deal with jam-packed airport crowds and the roaring engine rooms of cargo ships.
            </p>
            <p class='reading-47'>
                The remaining two traits are closely related and cognitive in nature. A good detector must be capable of focusing on the task of searching for drugs, despite the distractions in any airport or dockside. This is what neurobiologists call 'selective attention'. And finally, with potentially tens of thousands of hiding places for drugs, the dog must persevere and maintain focus for hours at a time. Neurobiologists call this 'sustained attention'.
            </p>
            <p class='reading-48'>
                Vandeloo and Champness assess the dogs' abilities to concentrate by marking them on a scale of between one and five according to how well they remain focused on a toy tossed into a patch of grass. Ivan scores a feeble one. He follows the toy, gets half-way there, then becomes distracted by places where the other dogs have been or by flowers in the paddock. Rowena, on the other hand, has phenomenal concentration; some might even consider her obsessive. When Vandeloo tosses the toy, nothing can distract her from the searching, not other dogs, not food. And even if no one is around to encourage her, she keeps looking just the same. Rowena gets a five.
            </p>
            <p class='reading-49'>
                A person's ability to pay attention, like a dog's, depends on a number of overlapping cognitive behaviours, including memory and learning - the neurobiologist's attention processing. Attention in humans can be tested by asking subjects to spot colours on a screen while ignoring shapes, or to spot sounds while ignoring visual cues, or to take a 'vigilance test'. Sitting a vigilance test is like being a military radar operator. Blips appear on a cluttered monitor infrequently and at irregular intervals. Rapid detection of all blips earns a high score. Five minutes into the test, one in ten subjects will start to miss the majority of the blips, one in ten will still be able to spot nearly all of them and the rest will come somewhere in between.
            </p>
            <p class='reading-50'>
                Vigilance tasks provide signals that are infrequent and unpredictable - which is exactly what is expected of the dogs when they are asked to notice just a few odour molecules in the air, and then to home in on the source. During a routine mail screen that can take hours, the dogs stay so focused that not even a postcard lined with 0.5 grams of heroin and hidden in a bulging sack of letters escapes detection.
            </p>
            <p class='reading-51'>
                With the current interest in attentional processing, as well as human conditions that have an attention deficit component, such as ADHD, it is predicted that it is only a matter of time before the super-sniffer dogs attract the attention of neurobiologists trying to cure these conditions.
            </p>
        ";
    ?>

    <!-- 1 - 7 -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <center><b>IELTS READING</b></center>
            <p class="question">
                Section 1	Question 1-14 <br><br>
            </p>
            <p>
                <i>Read the text below and answer Questions 1-7</i>
            </p>

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_1?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p class="question">
                                Questions 1-7<br><br>
                            </p>
                            <p>
                                Do the following statements agree with the information given in the text on page?<br>
                                <i>In boxes 1-7 on your answer sheet, write</i><br><br>
                            </p>
                            
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b><i>TRUE</i></b>
                                    </td>
                                    <td>
                                        <i>if the statement agrees with the information</i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b><i>FALSE</i></b>
                                    </td>
                                    <td>
                                        <i>if the statement contradicts the information</i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b><i>NOT GIVEN</i></b>
                                    </td>
                                    <td>
                                        <i>if there is no information on this</i>
                                    </td>
                                </tr>
                            </table>

                            <?php
                                $data_soal_1_7 = [
                                    [
                                        "no" => 1,
                                        "soal" => "Customers should inform Eastern Energy of a change of address on arrival at their new home.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[0]"
                                    ],
                                    [
                                        "no" => 2,
                                        "soal" => "Customers are expected to read their own gas or electricity metres.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[1]"
                                    ],
                                    [
                                        "no" => 3,
                                        "soal" => "It is now cheaper to use gas rather than electricity as a form of heating.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[2]"
                                    ],
                                    [
                                        "no" => 4,
                                        "soal" => "Eastern Energy supplies energy to households throughout the country.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[3]"
                                    ],
                                    [
                                        "no" => 5,
                                        "soal" => "The Energy Efficiency Line also handles queries about energy supply.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[4]"
                                    ],
                                    [
                                        "no" => 6,
                                        "soal" => "All complaints about energy supply should be made by phone.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[5]"
                                    ],
                                    [
                                        "no" => 7,
                                        "soal" => "Customers are not charged for the call when they report a fault in supply.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[6]"
                                    ],
                                ];
                            ?>

                                <?php foreach ($data_soal_1_7 as $data_soal) :?>
                                    <?= soal_pg_ielts($data_soal);?>
                                <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 7?>
    <!-- 8 - 14 -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_2?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                        <p class="question">
                            <b>Questions 8-14</b> <br><br>
                        </p>
                        <p>
                            The text on the page has seven sections, <b>A-G</b>.<br>
                            <i>Choose the correct heading for each section from the list of heading below.</i><br>
                            <i>Write the correct number, <b>i-x</b>, in boxes 8-14 on your answer sheet.</i>
                        </p>

                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b><center>List of Headings</center></b><br>
                                        <b>i</b>	Reheating <br>
                                        <b>ii</b>	Foods with skins    <br>
                                        <b>iii</b>	Keeping your oven clean    <br>
                                        <b>iv</b>	Standing time   <br>
                                        <b>v</b>	Rapid cooking times   <br>
                                        <b>vi</b>	Using a thermometer    <br>
                                        <b>vii</b>	Small quantities of food <br>
                                        <b>viii</b>	Deep fat frying <br>
                                        <b>ix</b>	Foods low in moisture <br>
                                        <b>x</b>	Liquids <br>
                                    </td>
                                </tr>
                            </table>

                            <p><b>8.</b> Section <b>A</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>9.</b> Section <b>B</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>10.</b> Section <b>C</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>11.</b> Section <b>D</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>12.</b> Section <b>E</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>13.</b> Section <b>F</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>14.</b> Section <b>G</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 14?>
    <!-- 15 - 20 -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="question">
                <b>SECTION 2	 Question 15-27</b> <br><br>
            </p>
            <p>
                <i>Read the text below and answer Questions 15-20.</i>
            </p>

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_3?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                            <p class="question">
                                <b>Questions 15-20</b> <br><br>
                            </p>
                            <p>
                                <i>
                                    Complete the sentences below.<br>
                                    Choose <b>NO MORE THAN TWO WORDS</b> from the text for each answer.<br>
                                    Write your answers in boxes 15-20 on your answer sheet.
                                </i>
                            </p>

                            <p><b>15.</b> Some people choose expensive premises because they want to create an impressive <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> for their company.</p>
                            <p><b>16.</b> Businesses which depend on <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> need to be on or near the principal shopping areas.</p>
                            <p><b>17.</b> Businesses which produce goods must check there is <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> to the premises for delivery vehicles.</p>
                            <p><b>18.</b> When choosing a building for your premises, find out whether <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> could be removed to create more room.</p>
                            <p><b>19.</b> Make sure that the <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> states what type of building alterations might be permitted.</p>
                            <p><b>20.</b> If business premises are located close to <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>, extensions may not be allowed.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <?php $i = 20?>
    <!-- 21 - 27 -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <p>
                <i>Read the text below and answer Questions 21-27</i>
            </p>

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_4?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                            <p class="question">
                                <b>Questions 21-27</b> <br>
                            </p>
                            <p>
                                <i>
                                    Answer the questions below<br>
                                    Choose <b>NO MORE THAN THREE WORDS</b> from the text for each answer.<br>
                                    Write your answers in boxes 21-27 on your answer sheet.
                                </i>
                            </p>
                            
                            <p><b>21.</b> Where do most employees collect their wages?  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>22.</b> Who has to authorise any overtime an employee wishes to do?  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>23.</b> Who is not paid extra for working more than 40 hours a week?  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>24.</b> Where should employees go if they wish to have the parking charge taken off their salary?  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>25.</b> What method is used to calculate part-time employees′ holidays?  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>26.</b> Which documents must employees fill in to select their Personal Holiday?  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>27.</b> What is the name of the special entitlement provided to employees with birthdays in the second half of December? <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 27?>
    <!-- 28 - 32 -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="question">
                <b>SECTION 3	Question 28-40</b> <br><br>
            </p>
            <p>
                <i>Read the text on page and answer Questions 28-40.</i>
            </p>

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_5?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                            <p class="question">
                                <b>Questions 28-32</b>
                            </p>
                            <p>
                                Choose the correct letter, <b>A</b>, <b>B</b>, <b>C</b>, or <b>D</b>.<br>
                                Write the correct letter in boxes 28-32 on your answer sheet.
                            </p>

                            <?php 
                            
                            $data_soal_28_32 = [
                                [
                                    "no" => 28,
                                    "soal" => "The drugs in the suitcase",
                                    "pilihan" => [
                                        "A. were hidden inside the lining.",
                                        "B. had pepper and coffee around them.",
                                        "C. had previously been frozen.",
                                        "D. had a special smell to repel dogs."
                                    ],
                                    "name" => "jawaban_reading[27]"
                                ],
                                [
                                    "no" => 29,
                                    "soal" => "Most dogs are not good at finding drugs because",
                                    "pilihan" => [
                                        "A. they don’t work well with a handler.",
                                        "B. they lack the right training.",
                                        "C. the drugs are usually very well hidden.",
                                        "D. they lack certain genetic qualities."
                                    ],
                                    "name" => "jawaban_reading[28]"
                                ],
                                [
                                    "no" => 30,
                                    "soal" => "Florence is a good drug detector because she",
                                    "pilihan" => [
                                        "A. has a better sense of smell than other dogs.",
                                        "B. is not easily distracted.",
                                        "C. has been specially trained to work at airports.",
                                        "D. enjoys what she is doing."
                                    ],
                                    "name" => "jawaban_reading[29]"
                                ],
                                [
                                    "no" => 31,
                                    "soal" => "Dogs like Florence may help scientists understand",
                                    "pilihan" => [
                                        "A. how human and dog brains differ.",
                                        "B. how people can use both sides of their brain.",
                                        "C. why some people have difficulty paying attention.",
                                        "D. the best way for people to maintain their focus."
                                    ],
                                    "name" => "jawaban_reading[30]"
                                ],
                                [
                                    "no" => 32,
                                    "soal" => "In 1993, the Australian Customs",
                                    "pilihan" => [
                                        "A. decided to use its own dogs again.",
                                        "B. was successful in finding detector dogs.",
                                        "C. changed the way it obtained dogs.",
                                        "D. asked private breeders to provide more dogs."
                                    ],
                                    "name" => "jawaban_reading[31]"
                                ],
                            ];

                            foreach ($data_soal_28_32 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal);?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 32?>
    <!-- 33 - 36 -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="question">
                <b>SECTION 3	Question 28-40</b>
            </p>
            <p>
                <i>Read the text on page and answer Questions 28-40.</i>
            </p>

            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <?= $text_6?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                            <p class="question">
                                <b>Questions 33-36</b>
                            </p>
                            <p>
                                <i>
                                    Choose <b>FOUR</b> letters, <b>A-J</b>.<br>
                                    Write the correct letters in boxes 33-36 on your answer sheet.<br>
                                </i>
                                The writer mentions a number of important qualities that detector dogs must have.<br>
                                Which <b>FOUR</b> of the following qualities are mentioned by the writer of the text?
                            </p>

                            <div class="ps-3 mb-3 mt-3">
                                <b>A.</b> a good relationship with people <br>
                                <b>B.</b> a willingness to work in smelly conditions <br>
                                <b>C.</b> quick reflexes <br>
                                <b>D.</b> an ability to work in noisy conditions <br>
                                <b>E.</b> an ability to maintain concentration <br>
                                <b>F.</b> a willingness to work without constant encouragement <br>
                                <b>G.</b> the skill to find things in long grass <br>
                                <b>H.</b> experience as hunters <br>
                                <b>I.</b> a desire for people’s approval <br>
                                <b>J.</b> the ability to search a large number of places rapidly
                            </div>

                            <p><b>33.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>34.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>35.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>36.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>

                            <p class="question mt-3">
                                <b>Questions 37-40</b>
                            </p>
                            <p>
                                Do the following statements agree with the information given in the text?<br>
                                <i>In boxes 37-40 on your answer sheet, write</i>
                            </p>

                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b>TRUE</b>     if the statement agrees with the information
                                        <b>FALSE</b>   	if the statement contradicts the information
                                        <b>NOT GIVEN</b>   if there is no information on this
                                    </td>
                                </tr>
                            </table>

                            <?php
                                $data_soal_37_40 = [
                                    [
                                        "no" => 37,
                                        "soal" => "Methods of determining if a child has ADHD are now widely accepted.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[36]"
                                    ],
                                    [
                                        "no" => 38,
                                        "soal" => "After about five minutes of a vigilance test, some subjects will still notice some blips.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[37]"
                                    ],
                                    [
                                        "no" => 39,
                                        "soal" => "Vigilance tests help improve concentration.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[38]"
                                    ],
                                    [
                                        "no" => 40,
                                        "soal" => "If a few grams of a drug are well concealed, even the best dogs will miss them.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[39]"
                                    ],
                                ];
                            ?>

                            <?php foreach ($data_soal_37_40 as $data_soal) :?>
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
        
                    <div class="ps-4">
                        <p><b>You have recently started work in a new company.</b></p>
                        <p><b>Write a letter to an English-speaking friend. In your letter</b></p>
                        <ul>
                            <li>
                                <b>explain why you changed jobs</b>
                            </li>
                            <li>
                                <b>describe your new job</b>
                            </li>
                            <li>
                                <b>tell him/her your other news</b>
                            </li>
                        </ul>
                    </div>
        
                    <p>You should write at least 150 words.</p>
                    <p>You do <b>NOT</b> need to write your own address. Begin your letter as follows:</p>
                    <p><b>Dear …………….,</b></p>
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
                    <p>Write about the following topic:</p>
                    <div class="ps-4">
                        <p><b>Some people prefer to live in a house, while others feel that there are more advantages to living in an apartment.</b></p>
                        <p><b>Are there more advantages than disadvantages of living in a house compared with living in an apartment?</b></p>
                    </div>
                    <p>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>
                    <p>Write at least 250 words</p>
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