<?= $this->extend('pages/soal/layout/soal_layout') ?>

<?= $this->section('sesi-listening') ?>
    <div class="card mb-3">
        <div class="card-body">
            <center>
                <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('public/assets/myaudio/transforme/gt-04/gt-04.mp3?t='.time())?>" type="audio/mpeg"></audio>
                <progress id="seekbar-1" value="0" max="1" style="width:100%;"></progress><br>
                <button class="btn btn-success btnAudio" data-id="1" type="button">play</button>
                <p><small class="text-danger"><i>note : The audio can only be played once</i></small></p>
            </center>
        </div>
    </div>

    <div class="card mb-3 soal">
        <?php $i = 0?>
        <div class="card-body">
            <center><b>IELTS LISTENING</b></center>
            <p class="question">SECTION 1</p>
            <p>
                    Questions 1-10 <br>
                    <i>Complete the form below.</i> <br>
                    <i>Write <b>NO MORE THAN THREE WORDS ANDIOR A NUMBER</b> for each answer.</i><br>
            </p>
            <table>

            </table>
            <center>
                <table class="tableSoal w-70 mb-3">
                    <tr>
                        <td><center><b>CAR INSURANCE</b></center></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Example &emsp;&emsp;&emsp;&emsp; Answer</p>
                            <p>Name: &emsp;&emsp;&emsp;&emsp; <b>Patrick Jones</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <b>Address:</b> &emsp;&emsp;&emsp;&emsp;&emsp; <b>1)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>, Greendale</p>
                            </p>
                            <p>
                                <b>Contact number:</b> &emsp; 730453
                            </p>
                            <p>
                                <b>Occupation:</b>&emsp;&emsp;&emsp;&emsp;<b>2)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>
                            </p>
                            <p>
                                <b>Size of car engine:</b>&emsp;1200cc <?= tabHtml(10)?> <b>Type of car:</b>
                            </p>
                            <p>
                                <?= tabHtml(27)?><b>Manufacturer</b>: Howton
                            </p>
                            <p>
                                <?= tabHtml(27)?><b>Model</b>: <b>3)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>
                            </p>
                            <p>
                                <?= tabHtml(27)?><b>Year</b>: 1997
                            </p>
                            <p><b>Previous insurance company: </b> <?= tabHtml(9)?> <b>Any insurance claims in the last five years?</b></p>
                            <p>
                                <b>4)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> <?= tabHtml(22)?> Yes <b>&#10003;</b>
                            </p>
                            <p>
                                <?= tabHtml(27)?>No
                            </p>
                            <p>
                                <?= tabHtml(24)?><b>If yes, give brief details:</b>
                            </p>
                            <p>
                                <?= tabHtml(27)?>Car was <b>5)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> in 1999
                            </p>
                            <p>
                                <b>Name(s)of other driver(s):</b><?= tabHtml(11)?><b>Uses of car:</b><?= tabHtml(1)?>– social
                            </p>
                            <p>
                                Simon <b>6)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?><?= tabHtml(23)?>– <b>8)</b><?= soal_isian_ielts("jawaban_listening[7]");?>
                            </p>
                            <p>
                                <b>Relationship to main driver:</b>
                            </p>
                            <p>
                                <b>7)</b><?= soal_isian_ielts("jawaban_listening[6]");?>
                            </p>
                            <p>
                                <b>Start date: </b>31 January
                            </p>
                            <p>
                                <b>Recommended Insurance arrangement</b>
                            </p>
                            <p>
                                <?php 
                                    $i = 8;
                                ?>
                                <b>Name of company:</b> <b>9)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>
                            </p>
                            <p>
                                <b>Annual cost:</b> <b>10)</b> $ <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>
                            </p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Questions 11-20<br>
            </p>
            <p>
                <b>Questions 11 and 12</b><br>
                <i>Label the map below.</i><br>
                <i>Write <b>NO MORE THAN TWO WORDS</b> for each answer.</i>
            </p>
            <center>
                <img src="<?= base_url()?>public/assets/img-soal/transforme/gt-04/L-11-12.png" alt="" class="img-fluid">
            </center>
            <p><b>11)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
            <p><b>12)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">Questions 13-18</p>
            <p>
                <i>Complete the table below.</i><br>
                <i>Write <b>NO MORE THAN TWO WORDS ANDIOR A NUMBER</b> for each answer.</i>
            </p>
            <center>
                <table class="tableSoal w-70 mb-3">
                    <tr>
                        <td></td>
                        <td>
                            Attraction
                        </td>
                        <td>
                            Further Information 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>STOP A</b>: <br>
                            Main Booking Office: <br>
                            First boat: 8 a.m. <br>
                            Last boat: <br>
                            <b>13)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> p.m.
                        </td>
                        <td>
                            Palace
                        </td>
                        <td>
                            &bull; has lovely <b>14)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>STOP B:</b>
                        </td>
                        <td>
                            <b>15)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>
                        </td>
                        <td>
                            &bull; has good <b>16)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> of city centre 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>STOP C:</b>
                        </td>
                        <td>
                            Museum
                        </td>
                        <td>
                            &bull; bookshop specializing in the <b>17)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> of the local area
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>STOP D:</b>
                        </td>
                        <td>
                            Entertainment Complex
                        </td>
                        <td>
                            &bull; <b>18)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> cinema <br>
                            &bull; Bowling alley <br>
                            &bull; video games arcade <br>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Questions 19 and 20 <br>
            </p>
            <p>
                <i>Write <b>NO MORE THAN THREE WORDS ANDIOR A NUMBER</b> for each answer.</i>
            </p>

            <p>
                <b>19)</b> How often do the Top Bus Company tours run? <br>
                <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>
            </p>
            <p>
                <b>20)</b> Where can you catch a Number One Sightseeing Tour from?<br>
                <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>
            </p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                SECTION 3 Questions 21 – 30
            </p>
            <p class="question">
                Questions 21-26<br>
            </p>
            <p>
                <i>Choose the correct letter <b>A</b>, <b>B</b> or <b>C</b></i>
            </p>
            <?php
                $data_soal_21_26 = [
                    [ 
                        "no" => 21, 
                        "soal" => "The Antarctic Centre was established in Christchurch because",
                        "pilihan" => [
                            "<b>A.</b> New Zealand is a member of the Antarctic Treaty.",
                            "<b>B.</b> Christchurch is geographically well positioned.",
                            "<b>C.</b> the climate of Christchurch is suitable."
                        ],
                        "name" => "jawaban_listening[20]"
                    ],
                    [ 
                        "no" => 22, 
                        "soal" => "One role of the Antarctic Centre is to",
                        "pilihan" => [
                            "<b>A.</b> provide expeditions with suitable equipment.",
                            "<b>B.</b> provide researchers with financial assistance.",
                            "<b>C.</b> ensure that research is internationally relevant."
                        ],
                        "name" => "jawaban_listening[21]"
                    ],
                    [ 
                        "no" => 23, 
                        "soal" => "The purpose of the Visitors’ Centre is to",
                        "pilihan" => [
                            "<b>A.</b> provide accommodation.",
                            "<b>B.</b> run training sessions.",
                            "<b>C.</b> show people what Antarctica is like."
                        ],
                        "name" => "jawaban_listening[22]"
                    ],
                    [ 
                        "no" => 24, 
                        "soal" => "Dr Merrywhether says that Antarctica is",
                        "pilihan" => [
                            "<b>A.</b> unlike any other country.",
                            "<b>B.</b> extremely beautiful.",
                            "<b>C.</b> too cold for tourists."
                        ],
                        "name" => "jawaban_listening[23]"
                    ],
                    [ 
                        "no" => 25, 
                        "soal" => "According to Dr Merrywhether, Antarctica is very cold because",
                        "pilihan" => [
                            "<b>A.</b> of the shape of the continent.",
                            "<b>B.</b> it is surrounded by a frozen sea.",
                            "<b>C.</b> it is an extremely dry continent."
                        ],
                        "name" => "jawaban_listening[24]"
                    ],
                    [ 
                        "no" => 26, 
                        "soal" => "Dr Merrywhether thinks Antarctica was part of another continent because",
                        "pilihan" => [
                            "<b>A.</b> he has done his own research in the area.",
                            "<b>B.</b> there is geological evidence of this.",
                            "<b>C.</b> it is very close to South America."
                        ],
                        "name" => "jawaban_listening[25]"
                    ],
                ];
            ?>

            <?php foreach ($data_soal_21_26 as $data_soal) :?>
                <?= soal_pg_ielts($data_soal)?>
            <?php endforeach;?>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Questions 27 and 28<br>
            </p>
            <p>
                <i>Complete the table below.</i><br>
                <i>Write <b>ONE WORD ANDIOR TWO NUMBERS</b>  for each answer.</i>
            </p>
            <center>
                <?php $i = 26?>
                <h6>
                    ANTARCTIC TREATY
                </h6>
                <table class="tableSoal w-50">
                    <tr>
                        <td>
                            Date
                        </td>
                        <td>
                            Event
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1870
                        </td>
                        <td>
                            Polar Research meeting
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>27)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>
                        </td>
                        <td>
                            1st International Polar Year
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1957
                        </td>
                        <td>
                            Antarctic Treaty was proposed
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1958
                        </td>
                        <td>
                            Antarctic Treaty was <b>28)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Question 29 and 30
            </p>

            <p>
                <i>
                    Choose <b>TWO</b> letters, <b>A-E</b>. <br>
                    Which <b>TWO</b> achievements of the Antarctic Treaty are mentioned by the speakers?
                </i>
            </p>

            <p class="ps-4"><b>A.</b> no military use</p>
            <p class="ps-4"><b>B.</b> animals protected</p>
            <p class="ps-4"><b>C.</b> historic sites preserved</p>
            <p class="ps-4"><b>D.</b> no nuclear testing</p>
            <p class="ps-4"><b>E.</b> fishing rights protected</p>

            <p><b>29.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
            <p><b>30.</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>

        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                SECTION 4 Questions 31-40
            </p>
            <p class="question">
                Questions 31-35<br>
            </p>
            <p>
                <i>Choose the correct letter <b>A</b>, <b>B</b> or <b>C</b></i>
            </p>
            <center>
                <h6>
                    Left and Right Handedness in Sport
                </h6>
            </center>

            <?php
                $data_soal_31_35 = [
                    [ 
                        "no" => 31, 
                        "soal" => "Anita first felt the Matthews article was of value when she realized",
                        "pilihan" => [
                            "<b>A.</b> how it would help her difficulties with left-handedness.",
                            "<b>B.</b> the relevance of connections he made with music.",
                            "<b>C.</b> the impressive size of his research project."
                        ],
                        "name" => "jawaban_listening[30]"
                    ],
                    [ 
                        "no" => 32, 
                        "soal" => "Anita feels that the findings on handedness will be of value in",
                        "pilihan" => [
                            "<b>A.</b> helping sportspeople identify their weaknesses.",
                            "<b>B.</b> aiding sportspeople as they plan tactics for each game.",
                            "<b>C.</b> developing suitable training programmes for sportspeople."
                        ],
                        "name" => "jawaban_listening[31]"
                    ],
                    [ 
                        "no" => 33, 
                        "soal" => "Anita feels that most sports coaches",
                        "pilihan" => [
                            "<b>A.</b> know nothing about the influence of handedness.",
                            "<b>B.</b> focus on the wrong aspects of performance.,",
                            "<b>C.</b> underestimate what science has to offer sport."
                        ],
                        "name" => "jawaban_listening[32]"
                    ],
                    [ 
                        "no" => 34, 
                        "soal" => "A German study showed there was greater ‘mixed handedness’ in musicians who",
                        "pilihan" => [
                            "<b>A.</b> started playing instruments in early youth.",
                            "<b>B.</b> play a string instrument such as the violin.",
                            "<b>C.</b> practice a great deal on their instrument."
                        ],
                        "name" => "jawaban_listening[33]"
                    ],
                    [ 
                        "no" => 35, 
                        "soal" => "Studies on ape behaviour show that",
                        "pilihan" => [
                            "<b>A.</b> apes which always use the same hand to get food are most successful.",
                            "<b>B.</b> apes have the same proportion of left-and right-handers as humans.",
                            "<b>C.</b> more apes are left-handed than right-handed."
                        ],
                        "name" => "jawaban_listening[34]"
                    ]
                ];
            ?>

            <?php foreach ($data_soal_31_35 as $data_soal) :?>
                <?= soal_pg_ielts($data_soal)?>
            <?php endforeach;?>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Questions 36-40<br>
            </p>
            <p>
                <i>Complete the table below.</i><br>
                <i>Write <b>ONE WORD ANDIOR TWO NUMBERS</b> for each answer.</i>
            </p>
            <center>
                <?php $i = 35?>
                <h6>
                    ANTARCTIC TREATY
                </h6>
                <table class="tableSoal w-70">
                    <tr>
                        <td><b>Sport</b></td>
                        <td><b>Best laterality</b></td>
                        <td><b>Comments</b></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Hockey</b>
                        </td>
                        <td>
                            mixed laterality
                        </td>
                        <td>
                            &bull; hockey stick has to be used in <b>36)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> <br>
                            &bull; Mixed-handed players found to be much more <b>37)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> than others
                        </td>
                        
                    </tr>
                    <tr>
                        <td><b>Tennis</b></td>
                        <td>single laterality</td>
                        <td>
                            &bull; gives a larger relevant field of <b>38)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> <br>
                            &bull; Cross-lateral players make <b>39)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> too late
                        </td>
                    </tr>
                    <tr>
                        <td><b>Gymnastics</b></td>
                        <td>cross laterality</td>
                        <td>&bull; gymnasts’ <b>40)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> is important for performances</td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

<?= $this->endSection()?>

<?= $this->section('sesi-reading') ?>
    <?php
        $text_1 = "
            <p><center><b>CALL ANYWHERE IN THE STATE FOR ONE LOW SHORT-DISTANCE RATE!</b></center></p>
            <p class='reading-1'>You have a choice of three Superfine Mobile Digital access plans: Leisure time, Executive and Highflier. They are designed to meet the needs of light, moderate and high-volume users. Calls in each plan are charged at only two rates - short-distance and long-distance. You enjoy big savings with off-peak calls.</p>
            <p class='reading-2'>
                ((b))LEISURETIME((/b))((br))
                Your mobile phone is mainly for personal use. You use your phone to keep family and friends in touch. You - don't want to strain your budget.((br1))
                With this plan, you enjoy the lowest monthly access fee and extremely competitive costs for calls. However, a monthly minimum call charge applies.
            </p>
            <p class='reading-3'>
                ((b))EXECUTIVE((/b))((br))
                You're in business and need to be able to call your office and your clients whenever the need arises. You value the convenience of a mobile phone but need to keep a close eye on overheads.((br1))
                For frequent users: the monthly access fee is slightly higher, but you enjoy the savings of a discounted call rate.
            </p>
            <p class='reading-4'>
                ((b))HIGHFLIER((/b))((br))
                You are always on the move and communications are critical. You need to be able to call and be called wherever you are -- world-wide. ((br1))
                As a high-volume user, you pay an access fee of just $60 a month but even lower call rates.
            </p>
            <center>
                <img src='". base_url() ."public/assets/img-soal/transforme/gt-04/R-1.png' alt='' class='img-fluid'>
            </center>
        ";

        $text_2 = "
            <p><center><b>Westwinds Farm Campsite</b></center></p>
            <p><center>Some important points to note</center></p>
            <p class='reading-10'>
                Open April - September((br))
                (Booking is advised for holidays in July and August to guarantee a place.)
            </p>
            <p class='reading-11'>
                Jim and Meg Oaks welcome you to the campsite. We hope you will enjoy your stay here.
            </p>
            <p class='reading-12'>
                We ask all campers to show due care and consideration whilst staying here and to observe the following camp rules.
            </p>
            <p class='reading-13'>
                ((b))&bull; Keep the campsite clean and tidy((/b))((br))
                - dispose of litter in the bins provided ((br1))
                - leave the showers, toilets and washing area in the same state as you found them ((br2))
                - ensure your site is clear of all litter when you leave it.
            </p>
            <p class='reading-14'>
                ((b))&bull; Don't obstruct rights of way.((/b))((br1))
                Keep cars, bikes, etc. off the road.
            </p>
            <p class='reading-15'>
                ((b))&bull; Let sleeping campers have some peace.((/b))((br2))
                Don't make any noise after 10 o'clock at night or before 7.30 in the morning.
            </p>
            <p class='reading-16'>
                ((b))&bull; Dogs must be kept on a lead.((/b))((br1))
                Owners of dogs that disturb other campers by barking through the night will be asked to leave.
            </p>
            <p class='reading-17'>
                ((b))&bull; Disorderly behavior will not be tolerated.((/b))
            </p>
            <p class='reading-18'>
                ((b))&bull; The lighting of fires is strictly prohibited.((/b))
            </p>
            <p class='reading-19'>
                ((b))&bull; Ball games are not allowed on the campsite.((/b))((br))
                There is plenty of room for ball games in the park opposite the campsite.
            </p>
            <p class='reading-20'>
                ((b))&bull; Radios, portable music equipment, etc. must not be played at high volume.((/b))((br))
                The management reserves the right to refuse admittance.
            </p>
        ";

        $text_3 = "
            <p><center><b>The law on minimum pay</b></center></p>
            <p class='reading-21'>
                ((b))Who is entitled to minimum pay?((/b))((br))
                Nearly all workers aged 16 years and over, including part-time workers, are entitled to the National Minimum Wage. Amongst those to whom it does not apply are those engaged in unpaid work and family members employed by the family business.
            </p>
            <p class='reading-22'>
                ((b))What is the minimum wage that I am entitled to?((/b))((br))
                The National Wage Act specifies the minimum rates of pay applicable nationwide. Since 1 October 2007, the adult rate for workers aged 22 and over has been £5.25 per hour. The development rate for 18-21 year olds and for workers getting training in the first 6 months of a job is £4.60 per hour. The rate for 16-17 year olds starts at £3.40 an hour. There are special provisions for some workers, for example, those whose job includes accommodation. Pay means gross pay and includes any items paid through the payroll such as overtime, bonus payments, commission and tips and gratuities.
            </p>
            <p class='reading-23'>
                ((b))I believe I'm being paid below the National Minimum Wage Rate. How can I complain?((/b))((br))
                If you are being paid less than this, there are various steps you can take: ((br1))
                &bull; If you feel able, you should talk directly with your employer. This is a clear legal right, and employers can be fined for not paying the NMW.((br2))
                &bull; If you are a trade union member, you should call in the union.((br3))
                &bull; If neither of these is appropriate then you can email via the Revenue and Customs website or call their helpline for advice.
            </p>
            <p class='reading-24'>
                You have the legal right to inspect your employer's pay records if you believe, on reasonable grounds, that you are being paid less than the NMW. Your employer is required to produce the records within 14 days, and must make them available at your place of work or at some other reasonable place. If your employer fails to produce the records, you may take the matter to an employment tribunal. You must make your complaint within three months of the ending of the 14-day notice period.
            </p>
        ";

        $text_4 = "
            <p><center><b><u>DEALING WITH YOUR OFFICE EMAILS</u></b></center></p>
            <p class='reading-25'>
                Email has completely changed the way we work today. It offers many benefits and, if used well, can be an excellent tool for improving your own efficiency. Managed badly, though, email can be a waste of valuable time. Statistics indicate that office workers need to wade through an average of more than 30 emails a day. Despite your best efforts, unsolicited email or spam can clutter up the most organised inbox and infect your computer system with viruses. Here we give you guidance on protecting yourself.
            </p>
            <p class='reading-26'>
                ((b))Prioritising incoming messages((/b))((br))
                If you are regularly faced with a large volume of incoming messages, you need to prioritise your inbox to identify which emails are really important. If it is obvious spam, it can be deleted without reading. Then follow these steps for each email: ((br1))((br2))
                    &bull; Check who the email is from. Were you expecting or hoping to hear from the sender? How quickly do they expect you to respond? ((br3))
                    &bull; Check what the email is about. Is the subject urgent? Is it about an issue that falls within your sphere of responsibility, or should it just be forwarded to someone else? ((br4))
                    &bull; Has the email been in your inbox for long? Check the message time.((br5))((br6))
                    An initial scan like this can help you identify the emails that require your prompt attention. The others can be kept for reading at a more convenient time.
                    
            </p>
            <p class='reading-27'>
                ((b))Replying in stages((/b))((br))
                Having prioritised your emails, you can answer them in stages, first with a brief acknowledgement and then a more detailed follow-up. This is particularly advisable when dealing with complicated matters where you don’t want to give a rushed answer. If you decide to do this, tell the recipient a definite date when you’ll be able to get back to him or her and try to keep to this wherever possible.
            </p>
            <p class='reading-28'>
                Some emails are uncomplicated and only require a brief, one line answer, so it’s a good idea to reply to these immediately. For example, if all you need to say is, ‘Yes, I can make the 10.00 meeting’, or ‘Thanks, that’s just the information I needed’, do it. If you are unable to reply there and then or choose not to, let the sender know that you’ve received the message and will be in touch as soon as possible.
            </p>
        ";

        $text_5 = "
            <p><center><b>THE IRON BRIDGE</b><br><i>The Iron Bridge was the first of its kind in Europe and is universally recognised as a symbol of the Industrial Revolution.</i></center></p>
            <p class='reading-31'>
                ((b))A.((/b)) The Iron Bridge crosses the River Severn in Coalbrookdale, in the west of England. It was the first cast-iron bridge to be successfully erected, and the first large cast-iron structure of the industrial age in Europe, although the Chinese were expert iron-casters many centuries earlier.
            </p>
            <p class='reading-32'>
                ((b))B.((/b)) Rivers used to be the equivalent of today’s motorways, in that they were extensively used for transportation. The River Severn, which starts its life on the Welsh mountains and eventually enters the sea between Cardiff and Bristol, is the longest navigable river in Britain. It was ideal for transportation purposes, and special boats were built to navigate the waters. By the middle of the eighteenth century, the Severn was one of the busiest rivers in Europe. Local goods, including coal, iron products, wool, grain and cider, were sent by the river. Among the goods coming upstream were luxuries such as sugar, tea, coffee and wine. In places, the riverbanks were lined with wharves and the river was often crowded with boats loading or unloading.
            </p>
            <p class='reading-33'>
                ((b))C.((/b)) In 1638, Basil Brooke patented a steel-making process and built a furnace at Coalbrookdale. This later became the property of Abraham Darby (referred to as Abraham Darby I to distinguish him from his son and grandson of the same name). After serving an apprenticeship in Birmingham, Darby had started a business in Bristol, but he moved to Coalbrookdale in 1710 with an idea that coke derived from coal could provide a more economical alternative to charcoal as a fuel for ironmaking. This led to cheaper, more efficient ironmaking from the abundant supplies of coal, iron and limestone in the area.
            </p>
            <p class='reading-34'>
                ((b))D.((/b)) His son, Abraham Darby II, pioneered the manufacture of cast iron, and had the idea of building a bridge over the Severn, as ferrying stores of all kinds across the river, particularly the large quantities of fuel for the furnaces at Coalbrookdale and other surrounding ironworks, involved considerable expense and delay. However, it was his son Abraham Darby III (born in 1750) who, in 1775, organised a meeting to plan the building of a bridge. This was designed by a local architect, Thomas Pritchard, who had the idea of constructing it of iron.
            </p>
            <p class='reading-35'>
                ((b))E.((/b)) Sections were cast during the winter of 1778-9 for a 7-metre-wide bridge with a span of 31 metres, 12 metres above the river. Construction took three months during the summer of 1779, and remarkably, nobody was injured during the construction process - a feat almost unheard of even in modern major civil engineering projects. Work on the approach roads continued for another two years, and the bridge was opened to traffic in 1781. Abraham Darby III funded the bridge by commissioning paintings and engravings, but he lost a lot on the project, which had cost nearly double the estimate, and he died leaving massive debts in 1789, aged only 39. The district did not flourish for much longer, and during the nineteenth and early twentieth centuries, factories closed down. Since 1934 the bridge has been open only to pedestrians. Universally recognised as the symbol of the Industrial Revolution, the Iron Bridge now stands at the heart of the Ironbridge Gorge World Heritage Site.
            </p>
            <p class='reading-36'>
                ((b))F.((/b)) It has always been a mystery how the bridge was built. Despite its pioneering technology, no eye-witness accounts are known which describe the iron bridge being erected - and certainly, no plans have survived. However, recent discoveries, research and experiments have shed new light on exactly how it was built, challenging the assumptions of recent decades. In 1997 a small watercolour sketch by Elias Martin came to light in the Swedish capital, Stockholm. Although there is a wealth of early views of the bridge by numerous artists, this is the only one which actually shows it under construction.
            </p>
            <p class='reading-37'>
                ((b))G.((/b)) Up until recently, it had been assumed that the bridge had been built from both banks, with the inner supports tilted across the river. This would have allowed river traffic to continue unimpeded during construction. But the picture clearly shows sections of the bridge being raised from a barge in the river. It contradicted everything historians had assumed about the bridge, and it was even considered that the picture could have been a fake as no other had come to light. So in 2001, a half-scale model of the bridge was built, in order to see if it could have been constructed in the way depicted in the watercolour. Meanwhile, a detailed archaeological, historical and photographic survey was done by the Ironbridge Gorge Museum Trust, along with a 3D CAD (computer-aided design) model by English Heritage.
            </p>
            <p class='reading-38'>
                ((b))H.((/b)) The results tell us a lot more about how the bridge was built. We now know that all the large castings were made individually as they are all slightly different. The bridge wasn’t welded or bolted together as metal bridges are these days. Instead it was fitted together using a complex system of joints normally used for wood - but this was the traditional way in which iron structures were joined at the time. The construction of the model proved that the painting shows a very realistic method of constructing the bridge that could work and was in all probability the method used.
            </p>
            <p class='reading-39'>
                ((b))I.((/b)) Now only one mystery remains in the Iron Bridge story. The Swedish watercolour sketch had apparently been torn from a book which would have contained similar sketches. It had been drawn by a Swedish artist who lived in London for 12 years and travelled Britain drawing what he saw. Nobody knows what has happened to the rest of the book, but perhaps the other sketches still exist somewhere. If they are ever found they could provide further valuable evidence of how the Iron Bridge was constructed.
            </p>
        ";

        $text_6 = "";
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
                                <i>Classify the following statements as referring to</i>
                            </p>
                            <br>
                            <p clas="ps-4"><b>A.</b> the LEISURETIME plan</p>
                            <p clas="ps-4"><b>B.</b> the EXECUTIVE plan</p>
                            <p clas="ps-4"><b>C.</b> the HIGHFLIER plan</p>
                            <p clas="ps-4"><b>D.</b> ALL three of the plans</p>
                            
                            <p><i>Write the correct letter, <b>A</b>, <b>B</b>, <b>C</b> or <b>D</b> in boxes 1-7 on your answer sheet.</i></p>

                            <?php $i = 0?>
                            <p><b>1)</b> The monthly access fee is the highest but the call rates are the lowest. <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>2)</b> Calls are charged at short-distance or long-distance rates. <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>3)</b> This plan is NOT primarily intended for people who need a mobile phone for their work. <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>4)</b> This plan is a cost-effective choice if you spend just over $100 a month on calls. <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>5)</b> It costs 21 cents for a 30-second long distance call at 2 p.m. <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>6)</b> The connection fee is $30. <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>7)</b> You will have to pay a minimum amount for calls each month. <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
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
                            <p><i>Read the text below and answer Questions 8-14.</i></p>
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
                                Do the following statements agree with the information given in the text on page? <br>
                                <i>In boxes 8-14 on your answer sheet, write</i>
                            </p>
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b>TRUE</b>     if the statement agrees with the information<br>
                                        <b>FALSE</b>   	if the statement contradicts the information<br>
                                        <b>NOT GIVEN</b>   if there is no information on this<br>
                                    </td>
                                </tr>
                            </table>

                            <?php
                                $data_soal_8_14 = [
                                    [
                                        "no" => 8,
                                        "soal" => "The campsite is open all year round.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[7]"
                                    ],
                                    [
                                        "no" => 9,
                                        "soal" => "You should book ahead for the busier times of the year.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[8]"
                                    ],
                                    [
                                        "no" => 10,
                                        "soal" => "The minimum stay at the campsite is two nights.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[9]"
                                    ],
                                    [
                                        "no" => 11,
                                        "soal" => "The entrance to the campsite is locked after 10 p.m.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[10]"
                                    ],
                                    [
                                        "no" => 12,
                                        "soal" => "No dogs are allowed on the campsite.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[11]"
                                    ],
                                    [
                                        "no" => 13,
                                        "soal" => "You are not allowed to cook food on open fires.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[12]"
                                    ],
                                    [
                                        "no" => 14,
                                        "soal" => "The owners of the campsite may not allow you to camp there.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[13]"
                                    ],
                                ];
                            ?>

                            <?php foreach ($data_soal_8_14 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal);?>
                            <?php endforeach;?>
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
                <i>Read the text below and answer Questions 15-27.</i>
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
                                    Choose <b>NO MORE THAN TWO WORDS AND/OR A NUMBER</b> from the text for each answer.<br>
                                    <i>Write your answers in boxes 15-20 on your answer sheet.</i>
                                </i>
                            </p>

                            <p><b>15)</b>The law on minimum pay doesn't cover you if you are working in your <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> or if you are a volunteer.</p>
                            <p><b>16)</b>You may be paid under £5 an hour if you are receiving <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> at the start of a job.</p>
                            <p><b>17)</b>There are different rules for people who are provided with <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> with their jobs.</p>
                            <p><b>18)</b>If you earn extra money, for example, for working longer hours or in tips, this counts as part of your wage when you receive it via <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> .</p>
                            <p><b>19)</b>Anyone being paid below the National Minimum Wage should speak to their  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> if they can.</p>
                            <p><b>20)</b>According to the law, you can ask to look at your boss's <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> .</p>
                            <p><b>21)</b>You have a period of <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> to complain if your boss does not co-operate within the specified period of time.   </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <?php $i = 21?>
    <!-- 22 - 27 -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <p>
                <i>Read the text below and answer Questions 22-27.</i>
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
                                <b>Questions 22-27</b> <br>
                            </p>
                            <p>
                                <i>
                                    Complete the flowchart below.<br>
                                    Choose <b>NO MORE THAN TWO WORDS</b> from the text for each answer.<br>
                                    Write your answers in boxes 22-27 on your answer sheet.
                                </i>
                            </p>
                            <center>
                                <img src="<?= base_url()?>public/assets/img-soal/transforme/gt-04/R-22-27.png" alt="" class="img-fluid">
                            </center>
                            <div class="mt-3">
                                <p><b>22)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                                <p><b>23)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                                <p><b>24)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                                <p><b>25)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                                <p><b>26)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                                <p><b>27)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 27?>
    <!-- 28 - 40 -->
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
                                <b>Questions 28-31</b>
                            </p>
                            <p>
                                <i>
                                    Answer the questions below.
                                    Choose <b>ONE NUMBER ONLY</b> from the text for each answer.
                                    Write your answers in boxes 28-31 on your answer sheet.
                                </i>
                            </p>
                            
                            <b>28)</b> When was the furnace bought by Darby originally constructed? <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
                            <b>29)</b> When were the roads leading to the bridge completed? <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
                            <b>30)</b> When was the bridge closed to traffic? <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
                            <b>31)</b> When was a model of the bridge built? <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>

                            <p class="question mt-3">
                                <b>Questions 32-36</b> <br><br>
                            </p>
                            <p>
                                Do the following statements agree with the information given in the text?<br>
                                <i>In boxes 32-36 on your answer sheet, write</i>
                            </p>
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b>TRUE</b>     if the statement agrees with the information<br>
                                        <b>FALSE</b>   	if the statement contradicts the information<br>
                                        <b>NOT GIVEN</b>   if there is no information on this<br>
                                    </td>
                                </tr>
                            </table>

                            <?php
                                $data_soal_32_36 = [
                                    [
                                        "no" => 32,
                                        "soal" => "There is no written evidence of how the original bridge was constructed.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[31]"
                                    ],
                                    [
                                        "no" => 33,
                                        "soal" => "The painting by Elias Martin is the only one of the bridge when it was new.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[32]"
                                    ],
                                    [
                                        "no" => 34,
                                        "soal" => "The painting shows that the bridge was constructed from the two banks.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[33]"
                                    ],
                                    [
                                        "no" => 35,
                                        "soal" => "The original bridge and the model took equally long to construct.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[34]"
                                    ],
                                    [
                                        "no" => 36,
                                        "soal" => "Elias Martin is thought to have made other paintings of the bridge.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[35]"
                                    ],
                                ];
                            ?>

                            <?php foreach ($data_soal_32_36 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal);?>
                            <?php endforeach;?>

                            <?php $i = 36?>
                            <p class="question mt-3">
                                <b>Questions 37-40</b> <br><br>
                            </p>
                            <p>
                                The text has nine paragraphs, <b>A-I</b>.<br>
                                Which paragraph contains the following information?<br>
                                Write the correct letter, <b>A-I</b>, in boxes 37-40 on your answer sheet. 
                            </p>

                            <b>37)</b> why a bridge was required across the River Severn <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
                            <b>38)</b> a method used to raise money for the bridge <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
                            <b>39)</b> why Coalbrookdale became attractive to iron makers <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
                            <b>40)</b> how the sections of the bridge were connected to each other <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>
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
                        <p><b>Last month you had a holiday overseas where you stayed with some friend. They have just sent you some photos of your holiday.</b></p>
                        <p><b>Write a letter to an English-speaking friend. In your letter</b></p>
                        <ul>
                            <li>
                                <b>Thank them for the photos and for the holiday</b>
                            </li>
                            <li>
                                <b>Explain why you didn’t write earlier</b>
                            </li>
                            <li>
                                <b>Invite them to come and stay with you</b>
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
                        <p><b>Some people feel that entertainers (e.g. film stars, pop musicians or sports stars) are paid too much money.</b></p>
                        <p><b>Do you agree or disagree?</b></p>
                        <p><b>Which other types of job should be highly paid?</b></p>
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