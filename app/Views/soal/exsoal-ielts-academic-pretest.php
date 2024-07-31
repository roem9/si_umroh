<?php $this->load->view("_partials/header")?>
    
    <form action="<?= base_url()?>soal/add_jawaban_ielts" method="post" id="formIelts">
        <div class="page page-center" id="login">
            <div class="container-tight py-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="text-center mt-4 mb-4">
                            <a href="javascript:void()"><img src="<?= base_url()?>/assets/img/topenglish.png" height="80" alt=""></a>
                        </div> -->
                        <?php if( $this->session->flashdata('pesan') ) : ?>
                            <div class="text-center mb-4">
                                <a href="javascript:void()"><img src="<?= base_url().'/assets/img/topenglish.png'?>" height="80" alt=""></a>
                            </div>
                            <?= $this->session->flashdata('pesan')?>
                        <?php else: ?>
                            <img src="<?= base_url()?>assets/img/poster.jpeg" alt="">
                            <div class="mb-2 mt-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="first_name" class="form form-control required">
                                            <label for="">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="last_name" class="form form-control required">
                                            <label for="">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form form-control required">
                                    <label for="">Email</label>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="button" class="btn btn-primary w-100 btnTransisiSatu">Start</button>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>

        <div class="page page-center" id="transisi-sesi-1" style="display:none">
            <div class="container-tight py-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <a href="javascript:void()"><img src="<?= base_url().'/assets/img/topenglish.png'?>" height="80" alt=""></a>
                        </div>
                        <center>
                            <p><b>First Session : LISTENING</b></p>
                            <p><i>Time : 40 Minutes</i></p>
                        </center>
                        <div class="form-footer">
                            <button type="button" class="btn btn-primary w-100 btnListening" >Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page page-center" id="transisi-sesi-2" style="display:none">
            <div class="container-tight py-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <a href="javascript:void()"><img src="<?= base_url().'/assets/img/topenglish.png'?>" height="80" alt=""></a>
                        </div>
                        <center>
                            <p><b>Second Session : READING</b></p>
                            <p><i>Time : 60 Minutes</i></p>
                        </center>
                        <div class="form-footer">
                            <button type="button" class="btn btn-primary w-100 btnReading">Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page page-center" id="transisi-sesi-3" style="display:none">
            <div class="container-tight py-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <a href="javascript:void()"><img src="<?= base_url().'/assets/img/topenglish.png'?>" height="80" alt=""></a>
                        </div>
                        <center>
                            <p><b>Third Session : WRITING</b></p>
                            <p><i>Time : 60 Minutes</i></p>
                        </center>
                        <div class="form-footer">
                            <button type="button" class="btn btn-primary w-100 btnWriting">Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="soal_tes" style="display:none">
            <div class="wrapper" id="elementtoScrollToID">
                <div class="sticky-top">
                    <?php $this->load->view("_partials/navbar-header")?>
                </div>
                <div class="page-wrapper" id="">
                    <div class="page-body">
                        <div class="container-xl">
                            <input type="hidden" name="id_tes" value="<?= $id?>">

                            <div class="sesi-listening" style="display:none">
                                <div class="shadow card mb-3">
                                    <div class="card-body">
                                        <center>
                                            <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('assets/myaudio/listening-academic-general-pretest.mp3?t='.time())?>" type="audio/mpeg"></audio>
                                            <progress id="seekbar-1" value="0" max="1" style="width:100%;"></progress><br>
                                            <button class="btn btn-success btnAudio" data-id="1" type="button"><?= tablerIcon("player-play", "")?> play</button>
                                            <p><small class="text-danger"><i>note : The audio can only be played once</i></small></p>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST ACADEMIC</b></center>
                                        <p class="question">
                                            SECTION 1 | Questions 1-10<br>
                                            Questions 1-10<br>
                                            Complete the table below.<br>
                                            Write NO MORE THAN TWO WORDS AND/OR A NUMBER for each answer.
                                        </p>

                                        <center><span><h3>Details of Claim Form</h3></span></center>
                                        <center>
                                            <table class="table" style="width:100%">
                                                <tr>
                                                    <td>Claiman’ts Address:</td>
                                                    <td>No.1 Yeronga St., <b>1)</b><?= soal_isian_ielts("jawaban_listening[0]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Telephone Number:</td>
                                                    <td><b>2)</b><?= soal_isian_ielts("jawaban_listening[1]")?> (home)</td>
                                                </tr>
                                                <tr>
                                                    <td>Respondent:</td>
                                                    <td><b>3)</b><?= soal_isian_ielts("jawaban_listening[2]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Address:</td>
                                                    <td><b>4)</b><?= soal_isian_ielts("jawaban_listening[3]")?> Avenue, Bardon </td>
                                                </tr>
                                                <tr>
                                                    <td>Postcode:</td>
                                                    <td><b>5)</b><?= soal_isian_ielts("jawaban_listening[4]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Guarantee:</td>
                                                    <td><b>6)</b><?= soal_isian_ielts("jawaban_listening[5]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Details of Claim:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>(+) Goods:</td>
                                                    <td><b>7)</b><?= soal_isian_ielts("jawaban_listening[6]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>(+) Agreed to pay:</td>
                                                    <td><b>8)</b><?= soal_isian_ielts("jawaban_listening[7]")?> pounds</td>
                                                </tr>
                                                <tr>
                                                    <td>(+) Advantages</td>
                                                    <td>Reduces the amount of <b>9)</b><?= soal_isian_ielts("jawaban_listening[8]")?> used</td>
                                                </tr>
                                                <tr>
                                                    <td>(+) Complaint</td>
                                                    <td>The appliance is very <b>10)</b><?= soal_isian_ielts("jawaban_listening[9]")?></td>
                                                </tr>

                                            </table>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST ACADEMIC</b></center>
                                        <p class="question">
                                            SECTION 2 | Questions 11-20<br>
                                            Questions 11-14<br>
                                            Complete the sentences below.<br>
                                            Write NO MORE THAN TWO WORDS in each gap.
                                        </p>

                                        <p><b>11)</b> The coach is comfortable because it is <?= soal_isian_ielts("jawaban_listening[10]")?>.</p>
                                        <p><b>12)</b> After all passengers are aboard, the coach will make its first stop at <?= soal_isian_ielts("jawaban_listening[11]")?> island. </p>
                                        <p><b>13)</b> The ‘Tree Top Walk’ is above a/an <?= soal_isian_ielts("jawaban_listening[12]")?>.</p>
                                        <p><b>14)</b> Passengers will have a/an <?= soal_isian_ielts("jawaban_listening[13]")?> with the alpacas before boarding the bus for home. </p>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST ACADEMIC</b></center>
                                        <p class="question">
                                            Questions 15-20<br>
                                            Complete the table below.<br>
                                            Write NO MORE THAN TWO WORDS in each gap
                                        </p>

                                        <center><span><h3>Dreamtime Tours</h3></span></center>
                                        <center>
                                            <table class="table" style="width:100%">
                                                <tr>
                                                    <td colspan=2>Bookings at <b>15)</b> <?= soal_isian_ielts("jawaban_listening[14]")?> or Tel: 07 5562 4402</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2><b>16)</b> <?= soal_isian_ielts("jawaban_listening[15]")?> Tour</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2>Sunday, Monday, and Friday</td>
                                                </tr>
                                                <tr>
                                                    <td>Cost:</td>
                                                    <td>Full-day tour 280km departs:</td>
                                                </tr>
                                                <tr>
                                                    <td>Adult &emsp;&emsp; $37.00</td>
                                                    <td>-Coolangatta &emsp;&emsp; 7.50AM</td>
                                                </tr>
                                                <tr>
                                                    <td><b>17)</b> <?= soal_isian_ielts("jawaban_listening[16]")?>                       $33.00</td>
                                                    <td>-Burleigh &emsp;&emsp; 8.10AM</td>
                                                </tr>
                                                <tr>
                                                    <td>Children (4-14 years) &emsp;&emsp; $10.00</td>
                                                    <td>-Surfers Paradise      <b>18)</b> <?= soal_isian_ielts("jawaban_listening[17]")?></td>
                                                </tr>
                                                <tr>
                                                    <td>Family   (2 adult,2 children) &emsp; $94.00</td>
                                                    <td>-Labrador &emsp;&emsp; 8.45AM</td>
                                                </tr>
                                                <tr>
                                                    <td>Prices include</td>
                                                    <td><b>19)</b> <?= soal_isian_ielts("jawaban_listening[18]")?> only.</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2>Free pick-up from your resort, hotel or motel.</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2>Not included in the fare: optional tours, luncheons, morning and afternoon tea (unless otherwise specified), <b>20)</b> <?= soal_isian_ielts("jawaban_listening[19]")?>.</td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2>Meals and refreshments are available at all stops (at your own cost).</td>
                                                </tr>
                                            </table>
                                        </center>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST ACADEMIC</b></center>
                                        <p class="question">
                                            SECTION 3 | Questions 21-30<br>
                                            Questions 21-25 <br>
                                            Choose the correct letter A,B,or C
                                        </p>

                                        <?php
                                            $data_soal_21_25 = [
                                                [ 
                                                    "no" => 21, 
                                                    "soal" => "According to the liaison officer, volunteers help",
                                                    "pilihan" => [
                                                        "<b>A.</b> improve language program",
                                                        "<b>B.</b> provide quality education",
                                                        "<b>C.</b> staff members in education system",
                                                    ],
                                                    "name" => "jawaban_listening[20]"
                                                ],
                                                [ 
                                                    "no" => 22, 
                                                    "soal" => "Volunteers help students check and correct",
                                                    "pilihan" => [
                                                        "<b>A.</b> written responses",
                                                        "<b>B.</b> assignments",
                                                        "<b>C.</b> presentation reports",
                                                    ],
                                                    "name" => "jawaban_listening[21]"
                                                ],
                                                [ 
                                                    "no" => 23, 
                                                    "soal" => "What aspect of students’ self-management can volunteers assist greatly with improving?",
                                                    "pilihan" => [
                                                        "<b>A.</b> organizational skills",
                                                        "<b>B.</b> problem-solving skills",
                                                        "<b>C.</b> independent thinking skills",
                                                    ],
                                                    "name" => "jawaban_listening[22]"
                                                ],
                                                [ 
                                                    "no" => 24, 
                                                    "soal" => "What will volunteers try to develop in the students so that they exert themselves more?",
                                                    "pilihan" => [
                                                        "<b>A.</b> strong determinations",
                                                        "<b>B.</b> enthusiasm for personal work",
                                                        "<b>C.</b> hard work and diligence",
                                                    ],
                                                    "name" => "jawaban_listening[23]"
                                                ],
                                                [ 
                                                    "no" => 25, 
                                                    "soal" => "What is it that teachers have that allows them to respond to individual student requirements?",
                                                    "pilihan" => [
                                                        "<b>A.</b> exchange of information and skills",
                                                        "<b>B.</b> many different teaching styles",
                                                        "<b>C.</b> partnership between teachers",
                                                    ],
                                                    "name" => "jawaban_listening[24]"
                                                ],
                                            ];
                                        ?>

                                        <?php foreach ($data_soal_21_25 as $data_soal) :?>
                                            <?= soal_pg_ielts($data_soal)?>
                                        <?php endforeach;?>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST ACADEMIC</b></center>
                                        <p class="question">
                                            Questions 26-30 <br>
                                            Which of the following phrases is appropriate for the contents below?<br>
                                            Choose FIVE answers from the list, A-H, and write it next to questions 26-30
                                        </p>
                                        <div class="row">
                                            <div class="col-6">
                                                <p><b>List of contents:</b></p>
                                                <p><b>26)</b> Sharon and Lester have different		: <?= soal_isian_ielts("jawaban_listening[25]")?></p>
                                                <p><b>27)</b> Sharon and Lester help students’		: <?= soal_isian_ielts("jawaban_listening[26]")?></p>
                                                <p><b>28)</b> The program is well underway		: <?= soal_isian_ielts("jawaban_listening[27]")?></p>
                                                <p><b>29)</b> The liaison officer is impressed by	: <?= soal_isian_ielts("jawaban_listening[28]")?></p>
                                                <p><b>30)</b> Students are encouraged to take part in	: <?= soal_isian_ielts("jawaban_listening[29]")?></p>
                                            </div>
                                            <div class="col-6">
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <b>List of Phrases</b><br>
                                                            <b>A.</b> Vocational learning experiences<br>
                                                            <b>B.</b> Practical components<br>
                                                            <b>C.</b> Self-learning software<br>
                                                            <b>D.</b> Academic background<br>
                                                            <b>E.</b> Marine studies <br>
                                                            <b>F.</b> Interesting developments<br>
                                                            <b>G.</b> Scholastic competitions<br>
                                                            <b>H.</b> Building and constructions
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3 soal">
                                    <div class="card-body ps-4">
                                        <center><b>IELTS LISTENING PRE-TEST ACADEMIC</b></center>
                                        <p class="question">
                                            SECTION 4 | Questions 31-40<br>
                                            Questions 31-40<br>
                                            Complete the notes below<br>
                                            Write ONE WORD ONLY in each gap
                                        </p>
                                        <p><center><b>A Case Study of Anxiety</b></center></p>
                                        <p><b>General information:</b></p>
                                        <ul type="bullet">
                                            <li>someone in an anxiety state has worse <b>31)</b> <?= soal_isian_ielts("jawaban_listening[30]")?></li>
                                            <li>a phobia may stem from heredity or <b>32)</b> <?= soal_isian_ielts("jawaban_listening[31]")?> problems</li>
                                            <li>the reason for the final breakdown is generally linked with <b>33)</b> <?= soal_isian_ielts("jawaban_listening[32]")?> occurrences</li>
                                        </ul>
                                        <p><b>Phobic states:</b></p>
                                        <ul type="bullet">
                                            <li>Agoraphobia		: fears leaving the home <b>34)</b> <?= soal_isian_ielts("jawaban_listening[33]")?></li>
                                            <li>Claustrophobia	: fears small <b>35)</b> <?= soal_isian_ielts("jawaban_listening[34]")?></li>
                                            <li>
                                            Social phobia		: <br>
                                                                a. feels extremely shy in the <b>36)</b> <?= soal_isian_ielts("jawaban_listening[35]")?> of people<br>
                                                                b. becomes <b>37)</b> <?= soal_isian_ielts("jawaban_listening[36]")?> in front of other people<br>
                                                                c. gets sweaty <b>38)</b> <?= soal_isian_ielts("jawaban_listening[37]")?> of the body
                                            </li>
                                            <li>
                                                Single phobia		: <br>
                                                                    a. has a deep-seated <b>39)</b> <?= soal_isian_ielts("jawaban_listening[38]")?> to particular creatures<br>
                                                                    b. fears of the <b>40)</b> <?= soal_isian_ielts("jawaban_listening[39]")?>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="btn btn-success btnTransisiDua">Next<?= tablerIcon("arrow-narrow-right", "me-0")?></a>
                                </div>
                            </div>

                            <div class="sesi-reading" style="display:none">
                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>Organic Farming and Chemical Fertilisers</h3></center></p>
                                        <span>A</span><br>
                                        <p class='reading-1'>The world’s population continues to climb. And despite the rise of high-tech agriculture, 800 million people don’t get enough to eat. Clearly it’s time to rethink the food we eat and where it comes from. Feeding 9 billion people will take more than the same old farming practices, especially if we want to do it without felling rainforests and planting every last scrap of prairie. Finding food for all those people will tax predicting farmers’-and researchers’-ingenuity to the limit. Yet already, precious aquifers that provide irrigation water for some of the world’s most productive farmlands are drying up or filling with seawater, and arable land in China is eroding to create vast dust storms that redden sunsets as far away as North America.    
                                        “Agriculture must become the solution to environmental problems in 50 years. If we don’t have systems that make the environment better not just hold the fort, then we’re in trouble,” says Kenneth Cassman, an agronomist at the University of Nebraska at Lincoln. That view was echoed in January by the Curry report, a government panel that surveyed the future of farming and food in Britain.</p>
                                        <span>B</span><br>
                                        <p class='reading-2'>It’s easy to say agriculture has to do better, but what should this friendly farming of the future look like? Concerned consumers come up short at this point, facing what appears to be an ever widening ideological divide. In one corner are the techno-optimists who put their faith in genetically modified crops, improved agrochemicals and computer-enhanced machinery, in the other are advocates of organic farming, who reject artificial chemicals and embrace back-to- nature techniques such as composting. Both sides cite plausible science to back their claims to the moral high ground, and both bring enough passion to the debate for many people to come away thinking we’re faced with a stark choice between two mutually incompatible options.</p>
                                        <span>C</span><br>
                                        <p class='reading-3'>Not so. If you take off the ideological blinkers and simply ask how the world can produce the food it needs with the least environment cost, a new middle way opens. The key is sustainability: whatever we do must not destroy the capital of soil and water we need to keep on producing. Like today’s organic farming, the intelligent farming of the future should pay much more attention to the health of its soil and the ecosystem its part of. But intelligent farming should also make shrewd and locally appreciate use of chemical fertilisers and pesticides. The most crucial ingredient in this new style of agriculture is not chemicals but information about what’s happening in each field and how to respond. Yet ironically, this key element may be the most neglected today.</p>
                                        <span>D</span><br>
                                        <p class='reading-4'>Clearly, organic farming has all the warm, fuzzy sentiment on its side. An approach that eschews synthetic chemicals surely runs no risk of poising land and water. And its emphasis on building up natural ecosystems seems to be good for everyone. Perhaps these easy assumptions explain why sales of organic food across Europe are increasing by at least cent per year.   </p>
                                        <span>E</span><br>
                                        <p class='reading-5'>Going organic sounds idyllic, but it’s naïve too. Organic agriculture has its own suite of environmental costs, which can be worse than those of conventional farming, especially if it were to become the world norm. But more fundamentally, the organic versus chemical debate focuses on the wrong question. The issue isn’t what you put into a farm, but what you get out of it, both in terms of crop yields and pollutants, and what condition the farm is in when you’re done. </p>
                                        <span>F</span><br>
                                        <p class='reading-6'>Take chemical fertilisers, which deliver nitrogen, an essential plant nutrient, to crops along with some phosphorus and potassium. It is a mantra of organic farming that these fertilisers are unwholesome, and plant nutrients must come from natural sources. But in fact the main environmental damage done by chemical fertilisers as opposed to any other kind is through greenhouse gases-carbon dioxide from the fossil fuels used in their synthesis and nitrogen oxides released by their degradation. Excess nitrogen from chemical fertilisers can pollute groundwater, but so can excess nitrogen from organic manures.</p>
                                        <span>G</span><br>
                                        <p class='reading-7'>On the other hand, relying solely on chemical fertilisers to provide soil nutrients without doing other things to build healthy soil is damaging. Organic farmers don’t use chemical fertilisers, so they are very good at building soil fertility by working crop residues and manure into the soil, rotating with legumes that fix atmospheric nitrogen, and other techniques. </p>
                                        <span>H</span><br>
                                        <p class='reading-8'>This generates vital soil nutrients and also creates a soil that is richer in organic matter, so it retains nutrients better and is hospitable to the crop’s roots and creatures such as earthworms that help maintain soil fertility. Such soil also holds water better and therefore makes more efficient use of both rainfall and irrigation water. And organic matter ties up C02 in the soil, helping to offset emissions from burning fossil fuels and reduce global warming.</p>
                                        <span>I</span><br>
                                        <p class='reading-9'>Advocates of organic farming like to point out that fields managed in this way can produce yields just as high as fields juiced up with synthetic fertilisers. For example, Bill Liebhardt, research manager at the Rodale Institute in Kutztown, Pennsylvania recently complied the result of such comparisons for corn, wheat, soybeans and tomatoes in the US and found that the organic fields averaged between 94 and 100 percent of the yields of nearby conventional crops.</p>
                                        <span>J</span><br>
                                        <p class='reading-10'>But this optimistic picture tells only half the story. Farmers can’t grow such crops every year if they want to maintain or build soil nutrients without synthetic fertilisers. They need to alternate with soil-building crops such as pasture grasses and legumes such as alfalfa. So in the long term, the yield of staple grains such as wheat, rice and com must go down. This is the biggest cost of organic farming. Vaclav Smil of the University of Manitoba in Winnipeg, Canada, estimates that if farmers worldwide gave up the 80 million tonnes of synthetic fertiliser they now use each year, total grain production would fall by at least half. Either farmers would have to double the amount of land they cultivate- at catastrophic cost to natural habitat or billions of people would starve.</p>
                                        <span>K</span><br>
                                        <p class='reading-11'>That doesn’t mean farmers couldn’t get by with less fertilizer. Technologically advanced farmers in wealthy countries, for instance, can now monitor their yields hectare by hectare, or even more finely, throughout a huge field. They can then target their fertiliser to the parts of the field where it will do the best, instead of responding to average conditions. This increases yield and decreases fertiliser use. Eventually, farmers may incorporate long-term weather forecasts into their planning as well, so that they can cut back on fertiliser use when the weather is likely to make harvests poor anyway, says Ron Olson, an agronomist with Cargill Fertilizer in Tampa, Florida.    </p>
                                        <span>L</span><br>
                                        <p class='reading-12'>Organic techniques certainly have their benefits, especially for poor farmers. But strict “organic agriculture”, which prohibits certain technologies and allows others, isn’t always better for the environment. Take herbicides, for example. These can leach into waterways and poison both wildlife and people. Just last month, researchers led by Tyrone Hayes at the University of California at Berkeley found that even low concentrations of atrazine, the most commonly used weed killer in the US, can prevent frog tadpoles from developing properly.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION ONE | QUESTIONS 1-13<br>
                                            PASSAGE ONE (Questions 1-13)<br>
                                            Read the Passage to Answer the Following Questions
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            QUESTIONS 1-4<br>
                                                            Use the information in the passage to match the people (listed A-D) with opinions or deeds below. Write the appropriate letters A-D for QUESTION 1-4 on your answer sheet. 
                                                        </p>

                                                        <p>
                                                            <b>List of People</b><br>
                                                            A. Vaclav Smil<br>
                                                            B. Bill Liebhardt<br>
                                                            C. Kenneth Cassman<br>
                                                            D. Ron Olson
                                                        </p>

                                                        <p>1. <?= soal_isian_ielts("jawaban_reading[0]")?> Use of chemical fertilizer can be optimised by combining weather information.</p>
                                                        <p>2. <?= soal_isian_ielts("jawaban_reading[1]")?> Organic framing yield is nearly equal to traditional ones.</p>
                                                        <p>3. <?= soal_isian_ielts("jawaban_reading[2]")?> Better agricultural setting is a significant key to solve environmental tough nut.</p>
                                                        <p>4. <?= soal_isian_ielts("jawaban_reading[3]")?> Substantial production loss would happen in case all farmers shifted from using synthetic fertiliser.</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>Organic Farming and Chemical Fertilisers</h3></center></p>
                                        <span>A</span><br>
                                        <p class='reading-13'>The world’s population continues to climb. And despite the rise of high-tech agriculture, 800 million people don’t get enough to eat. Clearly it’s time to rethink the food we eat and where it comes from. Feeding 9 billion people will take more than the same old farming practices, especially if we want to do it without felling rainforests and planting every last scrap of prairie. Finding food for all those people will tax predicting farmers’-and researchers’-ingenuity to the limit. Yet already, precious aquifers that provide irrigation water for some of the world’s most productive farmlands are drying up or filling with seawater, and arable land in China is eroding to create vast dust storms that redden sunsets as far away as North America.    
                                        “Agriculture must become the solution to environmental problems in 50 years. If we don’t have systems that make the environment better not just hold the fort, then we’re in trouble,” says Kenneth Cassman, an agronomist at the University of Nebraska at Lincoln. That view was echoed in January by the Curry report, a government panel that surveyed the future of farming and food in Britain.</p>
                                        <span>B</span><br>
                                        <p class='reading-14'>It’s easy to say agriculture has to do better, but what should this friendly farming of the future look like? Concerned consumers come up short at this point, facing what appears to be an ever widening ideological divide. In one corner are the techno-optimists who put their faith in genetically modified crops, improved agrochemicals and computer-enhanced machinery, in the other are advocates of organic farming, who reject artificial chemicals and embrace back-to- nature techniques such as composting. Both sides cite plausible science to back their claims to the moral high ground, and both bring enough passion to the debate for many people to come away thinking we’re faced with a stark choice between two mutually incompatible options.</p>
                                        <span>C</span><br>
                                        <p class='reading-15'>Not so. If you take off the ideological blinkers and simply ask how the world can produce the food it needs with the least environment cost, a new middle way opens. The key is sustainability: whatever we do must not destroy the capital of soil and water we need to keep on producing. Like today’s organic farming, the intelligent farming of the future should pay much more attention to the health of its soil and the ecosystem its part of. But intelligent farming should also make shrewd and locally appreciate use of chemical fertilisers and pesticides. The most crucial ingredient in this new style of agriculture is not chemicals but information about what’s happening in each field and how to respond. Yet ironically, this key element may be the most neglected today.</p>
                                        <span>D</span><br>
                                        <p class='reading-16'>Clearly, organic farming has all the warm, fuzzy sentiment on its side. An approach that eschews synthetic chemicals surely runs no risk of poising land and water. And its emphasis on building up natural ecosystems seems to be good for everyone. Perhaps these easy assumptions explain why sales of organic food across Europe are increasing by at least cent per year.   </p>
                                        <span>E</span><br>
                                        <p class='reading-17'>Going organic sounds idyllic, but it’s naïve too. Organic agriculture has its own suite of environmental costs, which can be worse than those of conventional farming, especially if it were to become the world norm. But more fundamentally, the organic versus chemical debate focuses on the wrong question. The issue isn’t what you put into a farm, but what you get out of it, both in terms of crop yields and pollutants, and what condition the farm is in when you’re done. </p>
                                        <span>F</span><br>
                                        <p class='reading-18'>Take chemical fertilisers, which deliver nitrogen, an essential plant nutrient, to crops along with some phosphorus and potassium. It is a mantra of organic farming that these fertilisers are unwholesome, and plant nutrients must come from natural sources. But in fact the main environmental damage done by chemical fertilisers as opposed to any other kind is through greenhouse gases-carbon dioxide from the fossil fuels used in their synthesis and nitrogen oxides released by their degradation. Excess nitrogen from chemical fertilisers can pollute groundwater, but so can excess nitrogen from organic manures.</p>
                                        <span>G</span><br>
                                        <p class='reading-19'>On the other hand, relying solely on chemical fertilisers to provide soil nutrients without doing other things to build healthy soil is damaging. Organic farmers don’t use chemical fertilisers, so they are very good at building soil fertility by working crop residues and manure into the soil, rotating with legumes that fix atmospheric nitrogen, and other techniques. </p>
                                        <span>H</span><br>
                                        <p class='reading-20'>This generates vital soil nutrients and also creates a soil that is richer in organic matter, so it retains nutrients better and is hospitable to the crop’s roots and creatures such as earthworms that help maintain soil fertility. Such soil also holds water better and therefore makes more efficient use of both rainfall and irrigation water. And organic matter ties up C02 in the soil, helping to offset emissions from burning fossil fuels and reduce global warming.</p>
                                        <span>I</span><br>
                                        <p class='reading-21'>Advocates of organic farming like to point out that fields managed in this way can produce yields just as high as fields juiced up with synthetic fertilisers. For example, Bill Liebhardt, research manager at the Rodale Institute in Kutztown, Pennsylvania recently complied the result of such comparisons for corn, wheat, soybeans and tomatoes in the US and found that the organic fields averaged between 94 and 100 percent of the yields of nearby conventional crops.</p>
                                        <span>J</span><br>
                                        <p class='reading-22'>But this optimistic picture tells only half the story. Farmers can’t grow such crops every year if they want to maintain or build soil nutrients without synthetic fertilisers. They need to alternate with soil-building crops such as pasture grasses and legumes such as alfalfa. So in the long term, the yield of staple grains such as wheat, rice and com must go down. This is the biggest cost of organic farming. Vaclav Smil of the University of Manitoba in Winnipeg, Canada, estimates that if farmers worldwide gave up the 80 million tonnes of synthetic fertiliser they now use each year, total grain production would fall by at least half. Either farmers would have to double the amount of land they cultivate- at catastrophic cost to natural habitat or billions of people would starve.</p>
                                        <span>K</span><br>
                                        <p class='reading-23'>That doesn’t mean farmers couldn’t get by with less fertilizer. Technologically advanced farmers in wealthy countries, for instance, can now monitor their yields hectare by hectare, or even more finely, throughout a huge field. They can then target their fertiliser to the parts of the field where it will do the best, instead of responding to average conditions. This increases yield and decreases fertiliser use. Eventually, farmers may incorporate long-term weather forecasts into their planning as well, so that they can cut back on fertiliser use when the weather is likely to make harvests poor anyway, says Ron Olson, an agronomist with Cargill Fertilizer in Tampa, Florida.    </p>
                                        <span>L</span><br>
                                        <p class='reading-24'>Organic techniques certainly have their benefits, especially for poor farmers. But strict “organic agriculture”, which prohibits certain technologies and allows others, isn’t always better for the environment. Take herbicides, for example. These can leach into waterways and poison both wildlife and people. Just last month, researchers led by Tyrone Hayes at the University of California at Berkeley found that even low concentrations of atrazine, the most commonly used weed killer in the US, can prevent frog tadpoles from developing properly.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION ONE | QUESTIONS 1-13<br>
                                            PASSAGE ONE (Questions 1-13)<br>
                                            Read the Passage to Answer the Following Questions
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                                QUESTIONS 5-9<br>
                                                                Do the following statements agree with the information given in the reading passage?
                                                            </p>

                                                        <p>
                                                            In boxes 5-9 on your answer sheet, write:<br>
                                                            <b>YES</b> 		if the statement agrees with the information    <br>
                                                            <b>NO</b> 		if the statement contradicts the information    <br>
                                                            <b>NOT GIVEN</b> 	if there is no information on this <br>
                                                        </p>

                                                        <?php
                                                            $data_soal_5_9 = [
                                                                [ 
                                                                    "no" => 5, 
                                                                    "soal" => "Increasing population, draining irrigation, eroding farmland push agricultural industry to extremity.",
                                                                    "pilihan" => [
                                                                        "YES",
                                                                        "NO",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[4]"
                                                                ],
                                                                [ 
                                                                    "no" => 6, 
                                                                    "soal" => "There are only two options for farmers; they use chemical fertiliser or natural approach. ",
                                                                    "pilihan" => [
                                                                        "YES",
                                                                        "NO",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[5]"
                                                                ],
                                                                [ 
                                                                    "no" => 7, 
                                                                    "soal" => "Chemical fertilizer currently is more expensive than the natural fertilisers. ",
                                                                    "pilihan" => [
                                                                        "YES",
                                                                        "NO",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[6]"
                                                                ],
                                                                [ 
                                                                    "no" => 8, 
                                                                    "soal" => "In order to keep nutrient in the soil, organic farmers need to rotate planting method.",
                                                                    "pilihan" => [
                                                                        "YES",
                                                                        "NO",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[7]"
                                                                ],
                                                                [ 
                                                                    "no" => 9, 
                                                                    "soal" => "“Organic agriculture” is the way that environment-damaging technologies are all strictly forbidden.",
                                                                    "pilihan" => [
                                                                        "YES",
                                                                        "NO",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[8]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_5_9 as $data_soal) :?>
                                                            <?= soal_pg_ielts($data_soal)?>
                                                        <?php endforeach;?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>Organic Farming and Chemical Fertilisers</h3></center></p>
                                        <span>A</span><br>
                                        <p class='reading-25'>The world’s population continues to climb. And despite the rise of high-tech agriculture, 800 million people don’t get enough to eat. Clearly it’s time to rethink the food we eat and where it comes from. Feeding 9 billion people will take more than the same old farming practices, especially if we want to do it without felling rainforests and planting every last scrap of prairie. Finding food for all those people will tax predicting farmers’-and researchers’-ingenuity to the limit. Yet already, precious aquifers that provide irrigation water for some of the world’s most productive farmlands are drying up or filling with seawater, and arable land in China is eroding to create vast dust storms that redden sunsets as far away as North America.    
                                        “Agriculture must become the solution to environmental problems in 50 years. If we don’t have systems that make the environment better not just hold the fort, then we’re in trouble,” says Kenneth Cassman, an agronomist at the University of Nebraska at Lincoln. That view was echoed in January by the Curry report, a government panel that surveyed the future of farming and food in Britain.</p>
                                        <span>B</span><br>
                                        <p class='reading-26'>It’s easy to say agriculture has to do better, but what should this friendly farming of the future look like? Concerned consumers come up short at this point, facing what appears to be an ever widening ideological divide. In one corner are the techno-optimists who put their faith in genetically modified crops, improved agrochemicals and computer-enhanced machinery, in the other are advocates of organic farming, who reject artificial chemicals and embrace back-to- nature techniques such as composting. Both sides cite plausible science to back their claims to the moral high ground, and both bring enough passion to the debate for many people to come away thinking we’re faced with a stark choice between two mutually incompatible options.</p>
                                        <span>C</span><br>
                                        <p class='reading-27'>Not so. If you take off the ideological blinkers and simply ask how the world can produce the food it needs with the least environment cost, a new middle way opens. The key is sustainability: whatever we do must not destroy the capital of soil and water we need to keep on producing. Like today’s organic farming, the intelligent farming of the future should pay much more attention to the health of its soil and the ecosystem its part of. But intelligent farming should also make shrewd and locally appreciate use of chemical fertilisers and pesticides. The most crucial ingredient in this new style of agriculture is not chemicals but information about what’s happening in each field and how to respond. Yet ironically, this key element may be the most neglected today.</p>
                                        <span>D</span><br>
                                        <p class='reading-28'>Clearly, organic farming has all the warm, fuzzy sentiment on its side. An approach that eschews synthetic chemicals surely runs no risk of poising land and water. And its emphasis on building up natural ecosystems seems to be good for everyone. Perhaps these easy assumptions explain why sales of organic food across Europe are increasing by at least cent per year.   </p>
                                        <span>E</span><br>
                                        <p class='reading-29'>Going organic sounds idyllic, but it’s naïve too. Organic agriculture has its own suite of environmental costs, which can be worse than those of conventional farming, especially if it were to become the world norm. But more fundamentally, the organic versus chemical debate focuses on the wrong question. The issue isn’t what you put into a farm, but what you get out of it, both in terms of crop yields and pollutants, and what condition the farm is in when you’re done. </p>
                                        <span>F</span><br>
                                        <p class='reading-30'>Take chemical fertilisers, which deliver nitrogen, an essential plant nutrient, to crops along with some phosphorus and potassium. It is a mantra of organic farming that these fertilisers are unwholesome, and plant nutrients must come from natural sources. But in fact the main environmental damage done by chemical fertilisers as opposed to any other kind is through greenhouse gases-carbon dioxide from the fossil fuels used in their synthesis and nitrogen oxides released by their degradation. Excess nitrogen from chemical fertilisers can pollute groundwater, but so can excess nitrogen from organic manures.</p>
                                        <span>G</span><br>
                                        <p class='reading-31'>On the other hand, relying solely on chemical fertilisers to provide soil nutrients without doing other things to build healthy soil is damaging. Organic farmers don’t use chemical fertilisers, so they are very good at building soil fertility by working crop residues and manure into the soil, rotating with legumes that fix atmospheric nitrogen, and other techniques. </p>
                                        <span>H</span><br>
                                        <p class='reading-32'>This generates vital soil nutrients and also creates a soil that is richer in organic matter, so it retains nutrients better and is hospitable to the crop’s roots and creatures such as earthworms that help maintain soil fertility. Such soil also holds water better and therefore makes more efficient use of both rainfall and irrigation water. And organic matter ties up C02 in the soil, helping to offset emissions from burning fossil fuels and reduce global warming.</p>
                                        <span>I</span><br>
                                        <p class='reading-33'>Advocates of organic farming like to point out that fields managed in this way can produce yields just as high as fields juiced up with synthetic fertilisers. For example, Bill Liebhardt, research manager at the Rodale Institute in Kutztown, Pennsylvania recently complied the result of such comparisons for corn, wheat, soybeans and tomatoes in the US and found that the organic fields averaged between 94 and 100 percent of the yields of nearby conventional crops.</p>
                                        <span>J</span><br>
                                        <p class='reading-34'>But this optimistic picture tells only half the story. Farmers can’t grow such crops every year if they want to maintain or build soil nutrients without synthetic fertilisers. They need to alternate with soil-building crops such as pasture grasses and legumes such as alfalfa. So in the long term, the yield of staple grains such as wheat, rice and com must go down. This is the biggest cost of organic farming. Vaclav Smil of the University of Manitoba in Winnipeg, Canada, estimates that if farmers worldwide gave up the 80 million tonnes of synthetic fertiliser they now use each year, total grain production would fall by at least half. Either farmers would have to double the amount of land they cultivate- at catastrophic cost to natural habitat or billions of people would starve.</p>
                                        <span>K</span><br>
                                        <p class='reading-35'>That doesn’t mean farmers couldn’t get by with less fertilizer. Technologically advanced farmers in wealthy countries, for instance, can now monitor their yields hectare by hectare, or even more finely, throughout a huge field. They can then target their fertiliser to the parts of the field where it will do the best, instead of responding to average conditions. This increases yield and decreases fertiliser use. Eventually, farmers may incorporate long-term weather forecasts into their planning as well, so that they can cut back on fertiliser use when the weather is likely to make harvests poor anyway, says Ron Olson, an agronomist with Cargill Fertilizer in Tampa, Florida.    </p>
                                        <span>L</span><br>
                                        <p class='reading-36'>Organic techniques certainly have their benefits, especially for poor farmers. But strict “organic agriculture”, which prohibits certain technologies and allows others, isn’t always better for the environment. Take herbicides, for example. These can leach into waterways and poison both wildlife and people. Just last month, researchers led by Tyrone Hayes at the University of California at Berkeley found that even low concentrations of atrazine, the most commonly used weed killer in the US, can prevent frog tadpoles from developing properly.</p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION ONE | QUESTIONS 1-13<br>
                                            PASSAGE ONE (Questions 1-13)<br>
                                            Read the Passage to Answer the Following Questions
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                    <p class="question">
                                                        QUESTIONS 10-13<br>
                                                        Complete the following summary of the paragraphs of Passage One, using NO MORE THAN TWO WORDS from Passage One  for each answer.    <br>
                                                        Write your answers on your answer sheet.  
                                                        </p>

                                                    <p>
                                                        Several <b>(10)</b><?= soal_isian_ielts("jawaban_reading[9]")?>.approaches need to be applied in order that global population wouldn’t go starved. A team called <b>(11)</b><?= soal_isian_ielts("jawaban_reading[10]")?>.repeated the viewpoint of a scholar by survey in British farming. More and more European farmers believe in <b>(12)</b><?= soal_isian_ielts("jawaban_reading[11]")?>. farming these years. The argument of organic against <b>(13)</b> <?= soal_isian_ielts("jawaban_reading[12]")?>.seems in an inaccurate direction.
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>The Pearl</h3></center></p>
                                        <span>A</span><br>
                                        <p class='reading-37'>Throughout history, pearls have held a unique presence within the wealthy and powerful. For instance, the pearl was the favoured gem of wealthy during the Roman Empire. This gift from the sea had been brought back from the orient by the Roman conquests. Roman women wore pearls to bed so they could be reminded of their wealth immediately upon waking up. Before jewellers learned to cut gems, the pearl was of greater value than the diamond. In the Orient and Persia Empire, pearls were ground into powders to cure anything from heart disease to epilepsy, with possible aphrodisiac uses as well. Pearls were once considered an exclusive privilege for royalty. A law in 1612 drawn up by the Duke of Saxony prohibited the wearing of pearls by nobility, professors, doctors or their wives in an effort to further distinguish royal appearance. American Indians also used freshwater pearls from the Mississippi River as decorations and jewelry. </p>
                                        <span>B</span><br>
                                        <p class='reading-38'>There are essentially three types of pearls: natural, cultured and imitation. A natural pearl (often called an Oriental pearl) forms when an irritant, such as a piece of sand, works its way into a particular species of oyster, mussel, or clam. As a defense mechanism, the mollusk secretes a fluid to coat the irritant. Layer upon layer of this coating is deposited on the irritant until a lustrous pearl is formed. </p>
                                        <span>C</span><br>
                                        <p class='reading-39'>The only difference natural pearls and cultured pearls is that the irritant is a surgically implanted bead or piece of shell called Mother of Pearl. Often, these shells are ground oyster shells that are worth significant amounts of money in their own right as irritant-catalysts for quality pearls. The resulting core is, therefore, much larger than in a natural pearl. Yet, as long as there are enough layers of nacre (the secreted fluid covering the irritant) to result in a beautiful, gem-quality pearl, the size of the nucleus is of no consequence to beauty or durability.</p>
                                        <span>D</span><br>
                                        <p class='reading-40'>Pearls can come from either salt or freshwater sources. Typically, saltwater pearls tend to be higher quality, although there are several types of freshwater pearls that are considered high in quality as well. Freshwater pearls tend to be very irregular in shape, with puffed rice appearance the most prevalent. Nevertheless, it is each individual pearls merits that determines value more than the source of the pearl. Saltwater pearl oysters are usually cultivated in protected lagoons or volcanic atolls. However, most freshwater cultured pearls sold today come from China. Cultured pearls are the response of the shell to a tissue implant. A tiny piece of mantle tissue from a donor shell is transplanted into a recipient shell. This graft will form a pearl sac and the tissue will precipitate calcium carbonate into this pocket. There are a number of options for producing cultured pearls: use freshwater or seawater shells, transplant the graft into the mantle or into the gonad, add a spherical bead or do it non-beaded. The majority of saltwater cultured pearls are grown with beads.</p>
                                        <span>E</span><br>
                                        <p class='reading-41'>Regardless of the method used to acquire a pearl, the process usually takes several years. Mussels must reach a mature age, which can take up to 3 years, and then be implanted or naturally receive an irritant. Once the irritant is in place, it can take up to another 3 years for the pearl to reach its full size. Often, the irritant may be rejected, the pearl will be terrifically misshapen, or the oyster may simply die from disease or countless other complications. By the end of a 5 to 10-year cycle, only 50% of the oysters will have survived. And of the pearls produced, only approximately 5% are of substantial quality for top jewelry makers. From the outset, a pearl farmer can figure on spending over $100 for every oyster that is farmed, of which many will produce nothing or die.</p>
                                        <span>F</span><br>
                                        <p class='reading-42'>Imitation pearls are different story altogether. In most cases, a glass bead is dipped into a solution made from fish scales. This coating is thin and may eventually wear off. One can usually tell an imitation by biting on it. Fake pearls glide across your teeth, while the layers of nacre on real pearls feel gritty. The Island of Mallorca (In Spain) is known for its imitation pearl industry. Quality natural pearls are very rare jewels. The actual value of a natural pearl is determined in the same way as it would be for other “precious” gems. The valuation factors include size, shape, and colour, quality of surface, orient and luster. In general, cultured pearls are less valuable than natural pearls, whereas imitation pearls almost have no value. One way that jewellers can determine whether a pearl is cultured or natural is to have a gem lab perform an x-ray of the pearl. If the x-ray reveals a nucleus, the pearl is likely a bead-nucleated saltwater pearl. If no nucleus is present, but irregular and small dark inner spots indicating a cavity are visible, combined with concentric rings of organic substance, the pearl is likely a cultured freshwater. Cultured freshwater pearls can often be confused for natural pearls which present as homogeneous pictures which continuously darken toward the surface of the pearl. Natural pearls will often show larger cavities where organic matter has dried out and decomposed. Although imitation pearls look the part, they do not have the same weight or smoothness as real pearls, and their luster will also dim greatly. Among cultured pearls, Akoya pearls from Japan are some of the most lustrous. A good quality necklace of 40 Akoya pearls measuring 7 mm in diameter sells for about $1,500, while a super-high quality strand sells for about $4,500. Size on the other hand, has to do with the age of the oyster that created the pearl (the more mature oysters produce larger pearls) and the location in which the pearl was cultured. The South Sea waters of Australia tend to produce the larger pearls; probably because the water along the coast line is supplied with rich nutrients from the ocean floor. Also, the type of mussel common to the area seems to possess a predilection for producing comparatively large pearls.  </p>
                                        <span>G</span><br>
                                        <p class='reading-43'>Historically, the world’s best pearls came from the Persian Gulf, especially around what is now Bahrian. The pearls of the Persian Gulf were natural created and collected by breath-hold divers. The secret to the special luster of Gulf pearls probably derived from the unique mixture of sweet and salt water around the Island. Unfortunately, the natural pearl industry of the Persian Gulf ended abruptly in the early 1930’s with the discovery of large deposits of oil. Those who once dove for pearls sought prosperity in the economic boom ushered in by the oil industry. The water pollution resulting from spilled oil and indiscriminate over-fishing of oysters essentially ruined the once pristine pearl producing waters of the Gulf. Today, pearl diving is practiced only as a hobby. Still, Bahrain remains one of the foremost trading centers for high quality pearls. In fact, cultured pearls are banned from the Bahrain pearl market, in an effort to preserve the location’s heritage. Nowadays, the largest stock of natural pearls probably resides in India. Ironically, much of India’s stock of natural pearls came originally from Bahrain. Unlike Bahrain, which has essentially lost its pearl resource, traditional pearl fishing is still practiced on a small scale in India.    </p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION TWO | QUESTIONS 14-27<br>
                                            PASSAGE TWO (Questions 14-27)
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                    <p class="question">
                                                        QUESTIONS 14-17<br>
                                                        Passage two has seven paragraphs, A-G.    <br>
                                                        Which paragraph contains the following information? 
                                                        </p>

                                                        <p>14. Ancient stories around the pearl and customers.<?= soal_isian_ielts("jawaban_reading[13]")?></p>
                                                        <p>15. Difficulties in cultivating process.<?= soal_isian_ielts("jawaban_reading[14]")?></p>
                                                        <p>16. Factors can decide the value of natural pearls.<?= soal_isian_ielts("jawaban_reading[15]")?></p>
                                                        <p>17. Different growth mechanisms distinguish the cultured pearls from natural ones.<?= soal_isian_ielts("jawaban_reading[16]")?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>The Pearl</h3></center></p>
                                        <span>A</span><br>
                                        <p class='reading-44'>Throughout history, pearls have held a unique presence within the wealthy and powerful. For instance, the pearl was the favoured gem of wealthy during the Roman Empire. This gift from the sea had been brought back from the orient by the Roman conquests. Roman women wore pearls to bed so they could be reminded of their wealth immediately upon waking up. Before jewellers learned to cut gems, the pearl was of greater value than the diamond. In the Orient and Persia Empire, pearls were ground into powders to cure anything from heart disease to epilepsy, with possible aphrodisiac uses as well. Pearls were once considered an exclusive privilege for royalty. A law in 1612 drawn up by the Duke of Saxony prohibited the wearing of pearls by nobility, professors, doctors or their wives in an effort to further distinguish royal appearance. American Indians also used freshwater pearls from the Mississippi River as decorations and jewelry. </p>
                                        <span>B</span><br>
                                        <p class='reading-45'>There are essentially three types of pearls: natural, cultured and imitation. A natural pearl (often called an Oriental pearl) forms when an irritant, such as a piece of sand, works its way into a particular species of oyster, mussel, or clam. As a defense mechanism, the mollusk secretes a fluid to coat the irritant. Layer upon layer of this coating is deposited on the irritant until a lustrous pearl is formed. </p>
                                        <span>C</span><br>
                                        <p class='reading-46'>The only difference natural pearls and cultured pearls is that the irritant is a surgically implanted bead or piece of shell called Mother of Pearl. Often, these shells are ground oyster shells that are worth significant amounts of money in their own right as irritant-catalysts for quality pearls. The resulting core is, therefore, much larger than in a natural pearl. Yet, as long as there are enough layers of nacre (the secreted fluid covering the irritant) to result in a beautiful, gem-quality pearl, the size of the nucleus is of no consequence to beauty or durability.</p>
                                        <span>D</span><br>
                                        <p class='reading-47'>Pearls can come from either salt or freshwater sources. Typically, saltwater pearls tend to be higher quality, although there are several types of freshwater pearls that are considered high in quality as well. Freshwater pearls tend to be very irregular in shape, with puffed rice appearance the most prevalent. Nevertheless, it is each individual pearls merits that determines value more than the source of the pearl. Saltwater pearl oysters are usually cultivated in protected lagoons or volcanic atolls. However, most freshwater cultured pearls sold today come from China. Cultured pearls are the response of the shell to a tissue implant. A tiny piece of mantle tissue from a donor shell is transplanted into a recipient shell. This graft will form a pearl sac and the tissue will precipitate calcium carbonate into this pocket. There are a number of options for producing cultured pearls: use freshwater or seawater shells, transplant the graft into the mantle or into the gonad, add a spherical bead or do it non-beaded. The majority of saltwater cultured pearls are grown with beads.</p>
                                        <span>E</span><br>
                                        <p class='reading-48'>Regardless of the method used to acquire a pearl, the process usually takes several years. Mussels must reach a mature age, which can take up to 3 years, and then be implanted or naturally receive an irritant. Once the irritant is in place, it can take up to another 3 years for the pearl to reach its full size. Often, the irritant may be rejected, the pearl will be terrifically misshapen, or the oyster may simply die from disease or countless other complications. By the end of a 5 to 10-year cycle, only 50% of the oysters will have survived. And of the pearls produced, only approximately 5% are of substantial quality for top jewelry makers. From the outset, a pearl farmer can figure on spending over $100 for every oyster that is farmed, of which many will produce nothing or die.</p>
                                        <span>F</span><br>
                                        <p class='reading-49'>Imitation pearls are different story altogether. In most cases, a glass bead is dipped into a solution made from fish scales. This coating is thin and may eventually wear off. One can usually tell an imitation by biting on it. Fake pearls glide across your teeth, while the layers of nacre on real pearls feel gritty. The Island of Mallorca (In Spain) is known for its imitation pearl industry. Quality natural pearls are very rare jewels. The actual value of a natural pearl is determined in the same way as it would be for other “precious” gems. The valuation factors include size, shape, and colour, quality of surface, orient and luster. In general, cultured pearls are less valuable than natural pearls, whereas imitation pearls almost have no value. One way that jewellers can determine whether a pearl is cultured or natural is to have a gem lab perform an x-ray of the pearl. If the x-ray reveals a nucleus, the pearl is likely a bead-nucleated saltwater pearl. If no nucleus is present, but irregular and small dark inner spots indicating a cavity are visible, combined with concentric rings of organic substance, the pearl is likely a cultured freshwater. Cultured freshwater pearls can often be confused for natural pearls which present as homogeneous pictures which continuously darken toward the surface of the pearl. Natural pearls will often show larger cavities where organic matter has dried out and decomposed. Although imitation pearls look the part, they do not have the same weight or smoothness as real pearls, and their luster will also dim greatly. Among cultured pearls, Akoya pearls from Japan are some of the most lustrous. A good quality necklace of 40 Akoya pearls measuring 7 mm in diameter sells for about $1,500, while a super-high quality strand sells for about $4,500. Size on the other hand, has to do with the age of the oyster that created the pearl (the more mature oysters produce larger pearls) and the location in which the pearl was cultured. The South Sea waters of Australia tend to produce the larger pearls; probably because the water along the coast line is supplied with rich nutrients from the ocean floor. Also, the type of mussel common to the area seems to possess a predilection for producing comparatively large pearls.  </p>
                                        <span>G</span><br>
                                        <p class='reading-50'>Historically, the world’s best pearls came from the Persian Gulf, especially around what is now Bahrian. The pearls of the Persian Gulf were natural created and collected by breath-hold divers. The secret to the special luster of Gulf pearls probably derived from the unique mixture of sweet and salt water around the Island. Unfortunately, the natural pearl industry of the Persian Gulf ended abruptly in the early 1930’s with the discovery of large deposits of oil. Those who once dove for pearls sought prosperity in the economic boom ushered in by the oil industry. The water pollution resulting from spilled oil and indiscriminate over-fishing of oysters essentially ruined the once pristine pearl producing waters of the Gulf. Today, pearl diving is practiced only as a hobby. Still, Bahrain remains one of the foremost trading centers for high quality pearls. In fact, cultured pearls are banned from the Bahrain pearl market, in an effort to preserve the location’s heritage. Nowadays, the largest stock of natural pearls probably resides in India. Ironically, much of India’s stock of natural pearls came originally from Bahrain. Unlike Bahrain, which has essentially lost its pearl resource, traditional pearl fishing is still practiced on a small scale in India.    </p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION TWO | QUESTIONS 14-27<br>
                                            PASSAGE TWO (Questions 14-27)
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            QUESTIONS 18-23<br>
                                                            Complete the summary below.    <br>
                                                            Choose letter from A-K for each answer.    <br>
                                                            Write them on your answer sheet.   
                                                        </p>

                                                        <p>
                                                            A. America<br>
                                                            B. Ancient Rome<br>
                                                            C. Australia<br>
                                                            D. Bahrain<br>
                                                            E. China<br>
                                                            F. Japan<br>
                                                            G. India<br>
                                                            H. Korea<br>
                                                            I. Mexico<br>
                                                            J. Persia<br>
                                                            K. Spain<br>
                                                        </p>
                                                        
                                                        <p>
                                                            In ancient history, pearls have great importance within the rich and rulers, which was treated as gem for women in <b>(18)</b><?= soal_isian_ielts("jawaban_reading[17]")?>., and pearls were even used as medicine and sex drug for drug for people in <b>(19)</b><?= soal_isian_ielts("jawaban_reading[18]")?> There are essentially three types of pearls: natural, cultured and imitation. Most freshwater cultured pearls sold today come from China while the <b>(20)</b><?= soal_isian_ielts("jawaban_reading[19]")?>.is famous for its imitation pearl industry. The country <b>(21)</b><?= soal_isian_ielts("jawaban_reading[20]")?> usually manufactures some of the glitteriest cultured ones while the nation such as <b>(22)</b><?= soal_isian_ielts("jawaban_reading[21]")?>.produces the larger sized pearl due to the favorable environment along the world’s best pearls. In the past, one country of <b>(23)</b><?= soal_isian_ielts("jawaban_reading[22]")?> in Gulf produced the world's best pearls belongs to India. Nowadays, the major remaining suppliers of natural pearls belong to India.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>The Pearl</h3></center></p>
                                        <span>A</span><br>
                                        <p class='reading-51'>Throughout history, pearls have held a unique presence within the wealthy and powerful. For instance, the pearl was the favoured gem of wealthy during the Roman Empire. This gift from the sea had been brought back from the orient by the Roman conquests. Roman women wore pearls to bed so they could be reminded of their wealth immediately upon waking up. Before jewellers learned to cut gems, the pearl was of greater value than the diamond. In the Orient and Persia Empire, pearls were ground into powders to cure anything from heart disease to epilepsy, with possible aphrodisiac uses as well. Pearls were once considered an exclusive privilege for royalty. A law in 1612 drawn up by the Duke of Saxony prohibited the wearing of pearls by nobility, professors, doctors or their wives in an effort to further distinguish royal appearance. American Indians also used freshwater pearls from the Mississippi River as decorations and jewelry. </p>
                                        <span>B</span><br>
                                        <p class='reading-52'>There are essentially three types of pearls: natural, cultured and imitation. A natural pearl (often called an Oriental pearl) forms when an irritant, such as a piece of sand, works its way into a particular species of oyster, mussel, or clam. As a defense mechanism, the mollusk secretes a fluid to coat the irritant. Layer upon layer of this coating is deposited on the irritant until a lustrous pearl is formed. </p>
                                        <span>C</span><br>
                                        <p class='reading-53'>The only difference natural pearls and cultured pearls is that the irritant is a surgically implanted bead or piece of shell called Mother of Pearl. Often, these shells are ground oyster shells that are worth significant amounts of money in their own right as irritant-catalysts for quality pearls. The resulting core is, therefore, much larger than in a natural pearl. Yet, as long as there are enough layers of nacre (the secreted fluid covering the irritant) to result in a beautiful, gem-quality pearl, the size of the nucleus is of no consequence to beauty or durability.</p>
                                        <span>D</span><br>
                                        <p class='reading-54'>Pearls can come from either salt or freshwater sources. Typically, saltwater pearls tend to be higher quality, although there are several types of freshwater pearls that are considered high in quality as well. Freshwater pearls tend to be very irregular in shape, with puffed rice appearance the most prevalent. Nevertheless, it is each individual pearls merits that determines value more than the source of the pearl. Saltwater pearl oysters are usually cultivated in protected lagoons or volcanic atolls. However, most freshwater cultured pearls sold today come from China. Cultured pearls are the response of the shell to a tissue implant. A tiny piece of mantle tissue from a donor shell is transplanted into a recipient shell. This graft will form a pearl sac and the tissue will precipitate calcium carbonate into this pocket. There are a number of options for producing cultured pearls: use freshwater or seawater shells, transplant the graft into the mantle or into the gonad, add a spherical bead or do it non-beaded. The majority of saltwater cultured pearls are grown with beads.</p>
                                        <span>E</span><br>
                                        <p class='reading-55'>Regardless of the method used to acquire a pearl, the process usually takes several years. Mussels must reach a mature age, which can take up to 3 years, and then be implanted or naturally receive an irritant. Once the irritant is in place, it can take up to another 3 years for the pearl to reach its full size. Often, the irritant may be rejected, the pearl will be terrifically misshapen, or the oyster may simply die from disease or countless other complications. By the end of a 5 to 10-year cycle, only 50% of the oysters will have survived. And of the pearls produced, only approximately 5% are of substantial quality for top jewelry makers. From the outset, a pearl farmer can figure on spending over $100 for every oyster that is farmed, of which many will produce nothing or die.</p>
                                        <span>F</span><br>
                                        <p class='reading-56'>Imitation pearls are different story altogether. In most cases, a glass bead is dipped into a solution made from fish scales. This coating is thin and may eventually wear off. One can usually tell an imitation by biting on it. Fake pearls glide across your teeth, while the layers of nacre on real pearls feel gritty. The Island of Mallorca (In Spain) is known for its imitation pearl industry. Quality natural pearls are very rare jewels. The actual value of a natural pearl is determined in the same way as it would be for other “precious” gems. The valuation factors include size, shape, and colour, quality of surface, orient and luster. In general, cultured pearls are less valuable than natural pearls, whereas imitation pearls almost have no value. One way that jewellers can determine whether a pearl is cultured or natural is to have a gem lab perform an x-ray of the pearl. If the x-ray reveals a nucleus, the pearl is likely a bead-nucleated saltwater pearl. If no nucleus is present, but irregular and small dark inner spots indicating a cavity are visible, combined with concentric rings of organic substance, the pearl is likely a cultured freshwater. Cultured freshwater pearls can often be confused for natural pearls which present as homogeneous pictures which continuously darken toward the surface of the pearl. Natural pearls will often show larger cavities where organic matter has dried out and decomposed. Although imitation pearls look the part, they do not have the same weight or smoothness as real pearls, and their luster will also dim greatly. Among cultured pearls, Akoya pearls from Japan are some of the most lustrous. A good quality necklace of 40 Akoya pearls measuring 7 mm in diameter sells for about $1,500, while a super-high quality strand sells for about $4,500. Size on the other hand, has to do with the age of the oyster that created the pearl (the more mature oysters produce larger pearls) and the location in which the pearl was cultured. The South Sea waters of Australia tend to produce the larger pearls; probably because the water along the coast line is supplied with rich nutrients from the ocean floor. Also, the type of mussel common to the area seems to possess a predilection for producing comparatively large pearls.  </p>
                                        <span>G</span><br>
                                        <p class='reading-57'>Historically, the world’s best pearls came from the Persian Gulf, especially around what is now Bahrian. The pearls of the Persian Gulf were natural created and collected by breath-hold divers. The secret to the special luster of Gulf pearls probably derived from the unique mixture of sweet and salt water around the Island. Unfortunately, the natural pearl industry of the Persian Gulf ended abruptly in the early 1930’s with the discovery of large deposits of oil. Those who once dove for pearls sought prosperity in the economic boom ushered in by the oil industry. The water pollution resulting from spilled oil and indiscriminate over-fishing of oysters essentially ruined the once pristine pearl producing waters of the Gulf. Today, pearl diving is practiced only as a hobby. Still, Bahrain remains one of the foremost trading centers for high quality pearls. In fact, cultured pearls are banned from the Bahrain pearl market, in an effort to preserve the location’s heritage. Nowadays, the largest stock of natural pearls probably resides in India. Ironically, much of India’s stock of natural pearls came originally from Bahrain. Unlike Bahrain, which has essentially lost its pearl resource, traditional pearl fishing is still practiced on a small scale in India.    </p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION TWO | QUESTIONS 14-27<br>
                                            PASSAGE TWO (Questions 14-27)
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            QUESTIONS 24-27<br>
                                                            Do the following statements agree with the information given in the Passage 2?    <br>
                                                            on your answer sheet, write:    
                                                        </p>

                                                        <p>
                                                            <b>TRUE</b> 		if the statement is true    <br>
                                                            <b>FALSE</b> 	if the statement is false    <br>
                                                            <b>NOT GIVEN</b> 	if the information is not given in the passage 
                                                        </p>
                                                        
                                                        <?php
                                                            $data_soal_24_27 = [
                                                                [ 
                                                                    "no" => 24, 
                                                                    "soal" => "Often cultured pearl’s centre is significantly larger than in a natural pearl.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[23]"
                                                                ],
                                                                [ 
                                                                    "no" => 25, 
                                                                    "soal" => "Cultivated cultured pearls are generally valued the same much as natural ones.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[24]"
                                                                ],
                                                                [ 
                                                                    "no" => 26, 
                                                                    "soal" => "The size of pearls produced in Japan is usually of smaller size than those came from Australia. ",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[25]"
                                                                ],
                                                                [ 
                                                                    "no" => 27, 
                                                                    "soal" => "Akoya pearls from Japan Glows more deeply than the South Sea pearls of Australia.",
                                                                    "pilihan" => [
                                                                        "TRUE",
                                                                        "FALSE",
                                                                        "NOT GIVEN",
                                                                    ],
                                                                    "name" => "jawaban_reading[26]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_24_27 as $data_soal) :?>
                                                            <?= soal_pg_ielts($data_soal)?>
                                                        <?php endforeach;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>The Pearl</h3></center></p>
                                        <span>A</span><br>
                                        <p class='reading-58'>Innovation and entrepreneurship, in the right mix, can bring spectacular results and propel a business ahead of the pack. Across diverse range of commercial successes, from the Hills Hoist clothes line to the Cochlear ear implant, it is hard to generalize beyond saying the creators tapped into something consumers could not wait to get their hands on. However, most ideas never make it to the market. Some ideas that innovators are spruiking to potential investors include new water-saving shower heads, a keyless locking system, ping-pong balls that keep pollution out of rainwater tanks, making teeth grow from stem cells inserted in the gum, and technology to stop LPG tanks from exploding. Grant Kearney, chief executive of the Innovation Xchange, which connects businesses to innovation networks, says he hears of great business ideas that he knows will never get on the market. “Ideas by themselves are absolutely useless,” he says. “An idea only becomes innovation when it is connected to the right resources and capabilities.”    </p>
                                        <span>B</span><br>
                                        <p class='reading-59'>One of Australia’s latest innovation successes stems from a lemon-scented bath-room cleaner called Shower Power, the formula for which was concocted in a factory in Yatala, Queensland. In 1995, Tom Quinn and John Heron bought a struggling cleaning products business, OzKleen, for 250,000. It was selling 100 different kinds of cleaning products, mainly in bulk. The business was in bad shape, the cleaning formulas were ineffective and environmentally harsh, and there were few regular clients. Now Shower Power is claimed to be the top-selling bathroom cleaning product in the country. In the past 12 months, almost four million bottles. The company’s, sales in 2003 reached $11 million, with 700k of business being exports. In particular, Shower Power is making big inroads on the British market.    </p>
                                        <span>C</span><br>
                                        <p class='reading-60'>OzKleen’s turnaround began when Quinn and Heron hired an industrial chemist to revitalize the product line. Market research showed that people were looking for a better cleaner for the bathroom, universally regarded as the hardest room in the home to clean. The company also wanted to make the product formulas more environmentally friendly One of Tom Quinn’s sons, Peter aged 24 at the time began working with chemist on the formulas, looking at the potential for citrus-based cleaning products. He detested all the chlorine-based cleaning products that dominated the market. “We didn’t want to use chlorine, simple as that,” he says. “It offers bad working conditions and there’s no money in it.” Peter looked at citrus ingredients, such as orange peel, to replace the petroleum by-products in cleaners. He is credited with finding the Shower Power formula. “The head,” he says. The company is the recipe is in a vault somewhere and in my sole owner of the intellectual property.   </p>
                                        <span>D</span><br>
                                        <p class='reading-61'>To begin with, Shower Power was sold only in commercial quantities but Tom Quinn decided to sell it in 750 ml bottles after the constant “raves” from customers at their retail store at Beenleigh, near Brisbane. Customers were travelling long distances to buy supplies. Others began writing to OzKleen to say how good Shower Power was. “We did a dummy label and went to see Woolworths,” Tom Quinn says. The Woolworths buyer took a bottle home and was able to remove a stain from her basin that had been impossible to shift. From that point on, she championed the product and OzKleen had its first super-market order, for a palette of Shower Power worth $3000. “We were over the moon,” says OzKleen’s financial controller, Belinda McDonnell.</p>
                                        <span>E</span><br>
                                        <p class='reading-62'>Shower Power was released in Australian supermarkets in 1997 and became the top-selling product in its category within six months. It was all hands on deck at the factory, labelling and bottling Shower Power to keep up with demand. OzKleen ditched all other products and rebuilt the business around Shower Power. This stage, recalls McDonnell, was very tough. “It was hand-to-mouth, cash flow was very difficult,” she says. OzKleen had to pay new-line fees to supermarket chains, which also squeezed margins.</p>
                                        <span>F</span><br>
                                        <p class='reading-63'>OzKleen’s next big break came when the daughter of a Coles Myer executive 1 used the product while on holidays in Queensland and convinced her father that Shower should be in Coles supermarkets. Despite the product success, Peter Quinn says the company was wary of how long the sales would last and hesitate to spend money on upgrading the manufacturing process. As a result, he remembers long periods of working around the clock to keep up with orders. Small tanks were still being used to batches were small and bottles were labelled and filled manually. The privately owned OzKleen relied on cash-flow to expand. “The equipment could not keep up with demand,” Peter Quinn says. Eventually a new bottling machine was bought for $50,000 in the hope of streamlining production, but he says: “We got ripped off.” Since then he has been developing a new automated bottling machine that can control the amount of foam produced in the liquid, so that bottles can be filled more effectively- “I love coming up with new ideas.” The machine is being patented.  </p>
                                        <span>G</span><br>
                                        <p class='reading-64'>Peter Quinn says OzKleen’s approach to research and development is open slather. “If I need it, I get I it. It is about doing something simple that no one else is doing. Most of these things are just sitting in front of people […] it’s just seeing the opportunities.” With a tried and tested product, OzKleen is expanding overseas and developing more Power-brand household products. Tom Quinn, who previously ran a real estate agency, says: “We are competing with the same market all over the world; the (cleaning) products are sold everywhere.” Shower Power, known as Bath Power in Britain, was launched four years ago with the help of an export development grand from the Federal Government. “We wanted to do it straight away because we realized we had the same opportunities worldwide.” OzKleen is already number three in the British market, and the next stop is France. The power range includes cleaning products for carpets, kitchens and pre-wash stain removal. The Quinn and Heron families are still involved. OzKleen has been approached with offers to buy the company, but Tom Quinn says he is happy with things as they are. “We’re having too much fun.” </p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION THREE | QUESTIONS 28-40<br>
                                            PASSAGE THREE (Questions 28-40)
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            QUESTIONS 28-34<br>
                                                            Reading Passage Three has seven paragraphs, A-G.
                                                        </p>

                                                        <p><i>Which paragraph contains the following information?    <br>
                                                            Write the correct letter A-G, on your answer sheet. You may use any letter more than once.</i>
                                                        </p>

                                                        <p>28. Description of one family member persuading another of selling cleaning products. <?= soal_isian_ielts("jawaban_reading[27]")?></p>
                                                        <p>29. An account of the cooperation of all factory staff to cope with sales increase. <?= soal_isian_ielts("jawaban_reading[28]")?></p>
                                                        <p>30. An account of the creation of the formula of Shower Power. <?= soal_isian_ielts("jawaban_reading[29]")?></p>
                                                        <p>31. An account of buying the original OzKleen company. <?= soal_isian_ielts("jawaban_reading[30]")?></p>
                                                        <p>32. Description of Shower Power’s international expansion. <?= soal_isian_ielts("jawaban_reading[31]")?></p>
                                                        <p>33. The reason of changing the packaging size of Shower Power. <?= soal_isian_ielts("jawaban_reading[32]")?></p>
                                                        <p>34. An example of some innovative ideas. <?= soal_isian_ielts("jawaban_reading[33]")?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>The Pearl</h3></center></p>
                                        <span>A</span><br>
                                        <p class='reading-65'>Innovation and entrepreneurship, in the right mix, can bring spectacular results and propel a business ahead of the pack. Across diverse range of commercial successes, from the Hills Hoist clothes line to the Cochlear ear implant, it is hard to generalize beyond saying the creators tapped into something consumers could not wait to get their hands on. However, most ideas never make it to the market. Some ideas that innovators are spruiking to potential investors include new water-saving shower heads, a keyless locking system, ping-pong balls that keep pollution out of rainwater tanks, making teeth grow from stem cells inserted in the gum, and technology to stop LPG tanks from exploding. Grant Kearney, chief executive of the Innovation Xchange, which connects businesses to innovation networks, says he hears of great business ideas that he knows will never get on the market. “Ideas by themselves are absolutely useless,” he says. “An idea only becomes innovation when it is connected to the right resources and capabilities.”    </p>
                                        <span>B</span><br>
                                        <p class='reading-66'>One of Australia’s latest innovation successes stems from a lemon-scented bath-room cleaner called Shower Power, the formula for which was concocted in a factory in Yatala, Queensland. In 1995, Tom Quinn and John Heron bought a struggling cleaning products business, OzKleen, for 250,000. It was selling 100 different kinds of cleaning products, mainly in bulk. The business was in bad shape, the cleaning formulas were ineffective and environmentally harsh, and there were few regular clients. Now Shower Power is claimed to be the top-selling bathroom cleaning product in the country. In the past 12 months, almost four million bottles. The company’s, sales in 2003 reached $11 million, with 700k of business being exports. In particular, Shower Power is making big inroads on the British market.    </p>
                                        <span>C</span><br>
                                        <p class='reading-67'>OzKleen’s turnaround began when Quinn and Heron hired an industrial chemist to revitalize the product line. Market research showed that people were looking for a better cleaner for the bathroom, universally regarded as the hardest room in the home to clean. The company also wanted to make the product formulas more environmentally friendly One of Tom Quinn’s sons, Peter aged 24 at the time began working with chemist on the formulas, looking at the potential for citrus-based cleaning products. He detested all the chlorine-based cleaning products that dominated the market. “We didn’t want to use chlorine, simple as that,” he says. “It offers bad working conditions and there’s no money in it.” Peter looked at citrus ingredients, such as orange peel, to replace the petroleum by-products in cleaners. He is credited with finding the Shower Power formula. “The head,” he says. The company is the recipe is in a vault somewhere and in my sole owner of the intellectual property.   </p>
                                        <span>D</span><br>
                                        <p class='reading-68'>To begin with, Shower Power was sold only in commercial quantities but Tom Quinn decided to sell it in 750 ml bottles after the constant “raves” from customers at their retail store at Beenleigh, near Brisbane. Customers were travelling long distances to buy supplies. Others began writing to OzKleen to say how good Shower Power was. “We did a dummy label and went to see Woolworths,” Tom Quinn says. The Woolworths buyer took a bottle home and was able to remove a stain from her basin that had been impossible to shift. From that point on, she championed the product and OzKleen had its first super-market order, for a palette of Shower Power worth $3000. “We were over the moon,” says OzKleen’s financial controller, Belinda McDonnell.</p>
                                        <span>E</span><br>
                                        <p class='reading-69'>Shower Power was released in Australian supermarkets in 1997 and became the top-selling product in its category within six months. It was all hands on deck at the factory, labelling and bottling Shower Power to keep up with demand. OzKleen ditched all other products and rebuilt the business around Shower Power. This stage, recalls McDonnell, was very tough. “It was hand-to-mouth, cash flow was very difficult,” she says. OzKleen had to pay new-line fees to supermarket chains, which also squeezed margins.</p>
                                        <span>F</span><br>
                                        <p class='reading-70'>OzKleen’s next big break came when the daughter of a Coles Myer executive 1 used the product while on holidays in Queensland and convinced her father that Shower should be in Coles supermarkets. Despite the product success, Peter Quinn says the company was wary of how long the sales would last and hesitate to spend money on upgrading the manufacturing process. As a result, he remembers long periods of working around the clock to keep up with orders. Small tanks were still being used to batches were small and bottles were labelled and filled manually. The privately owned OzKleen relied on cash-flow to expand. “The equipment could not keep up with demand,” Peter Quinn says. Eventually a new bottling machine was bought for $50,000 in the hope of streamlining production, but he says: “We got ripped off.” Since then he has been developing a new automated bottling machine that can control the amount of foam produced in the liquid, so that bottles can be filled more effectively- “I love coming up with new ideas.” The machine is being patented.  </p>
                                        <span>G</span><br>
                                        <p class='reading-71'>Peter Quinn says OzKleen’s approach to research and development is open slather. “If I need it, I get I it. It is about doing something simple that no one else is doing. Most of these things are just sitting in front of people […] it’s just seeing the opportunities.” With a tried and tested product, OzKleen is expanding overseas and developing more Power-brand household products. Tom Quinn, who previously ran a real estate agency, says: “We are competing with the same market all over the world; the (cleaning) products are sold everywhere.” Shower Power, known as Bath Power in Britain, was launched four years ago with the help of an export development grand from the Federal Government. “We wanted to do it straight away because we realized we had the same opportunities worldwide.” OzKleen is already number three in the British market, and the next stop is France. The power range includes cleaning products for carpets, kitchens and pre-wash stain removal. The Quinn and Heron families are still involved. OzKleen has been approached with offers to buy the company, but Tom Quinn says he is happy with things as they are. “We’re having too much fun.” </p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION THREE | QUESTIONS 28-40<br>
                                            PASSAGE THREE (Questions 28-40)
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            QUESTIONS 36-38<br>
                                                            Look at the following people and list of statements below. <br>
                                                            Match each person with the correct statement <br>
                                                            Write the correct letter A-E on your answer sheet.
                                                        </p>

                                                        <p>
                                                            <b>List of Statement    </b><br>
                                                            A. Described his story of selling his product to a chain store<br>
                                                            B. Explained there was a shortage of money when sales suddenly increased<br>
                                                            C. Believe innovations need support to succeed<br>
                                                            D. Believes new products like Shower Power may incur risks<br>
                                                            E. Says business won’t succeed with innovations
                                                        </p>

                                                        <p>35. Grant Keamey <?= soal_isian_ielts("jawaban_reading[34]")?></p>
                                                        <p>36. Tom Quinn <?= soal_isian_ielts("jawaban_reading[35]")?></p>
                                                        <p>37. Peter Quinn <?= soal_isian_ielts("jawaban_reading[36]")?></p>
                                                        <p>38. Belinda McDonnell <?= soal_isian_ielts("jawaban_reading[37]")?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="shadow card mb-3">
                                    <?php
                                        $text = "
                                        <p><center><h3>The Pearl</h3></center></p>
                                        <span>A</span><br>
                                        <p class='reading-72'>Innovation and entrepreneurship, in the right mix, can bring spectacular results and propel a business ahead of the pack. Across diverse range of commercial successes, from the Hills Hoist clothes line to the Cochlear ear implant, it is hard to generalize beyond saying the creators tapped into something consumers could not wait to get their hands on. However, most ideas never make it to the market. Some ideas that innovators are spruiking to potential investors include new water-saving shower heads, a keyless locking system, ping-pong balls that keep pollution out of rainwater tanks, making teeth grow from stem cells inserted in the gum, and technology to stop LPG tanks from exploding. Grant Kearney, chief executive of the Innovation Xchange, which connects businesses to innovation networks, says he hears of great business ideas that he knows will never get on the market. “Ideas by themselves are absolutely useless,” he says. “An idea only becomes innovation when it is connected to the right resources and capabilities.”    </p>
                                        <span>B</span><br>
                                        <p class='reading-73'>One of Australia’s latest innovation successes stems from a lemon-scented bath-room cleaner called Shower Power, the formula for which was concocted in a factory in Yatala, Queensland. In 1995, Tom Quinn and John Heron bought a struggling cleaning products business, OzKleen, for 250,000. It was selling 100 different kinds of cleaning products, mainly in bulk. The business was in bad shape, the cleaning formulas were ineffective and environmentally harsh, and there were few regular clients. Now Shower Power is claimed to be the top-selling bathroom cleaning product in the country. In the past 12 months, almost four million bottles. The company’s, sales in 2003 reached $11 million, with 700k of business being exports. In particular, Shower Power is making big inroads on the British market.    </p>
                                        <span>C</span><br>
                                        <p class='reading-74'>OzKleen’s turnaround began when Quinn and Heron hired an industrial chemist to revitalize the product line. Market research showed that people were looking for a better cleaner for the bathroom, universally regarded as the hardest room in the home to clean. The company also wanted to make the product formulas more environmentally friendly One of Tom Quinn’s sons, Peter aged 24 at the time began working with chemist on the formulas, looking at the potential for citrus-based cleaning products. He detested all the chlorine-based cleaning products that dominated the market. “We didn’t want to use chlorine, simple as that,” he says. “It offers bad working conditions and there’s no money in it.” Peter looked at citrus ingredients, such as orange peel, to replace the petroleum by-products in cleaners. He is credited with finding the Shower Power formula. “The head,” he says. The company is the recipe is in a vault somewhere and in my sole owner of the intellectual property.   </p>
                                        <span>D</span><br>
                                        <p class='reading-75'>To begin with, Shower Power was sold only in commercial quantities but Tom Quinn decided to sell it in 750 ml bottles after the constant “raves” from customers at their retail store at Beenleigh, near Brisbane. Customers were travelling long distances to buy supplies. Others began writing to OzKleen to say how good Shower Power was. “We did a dummy label and went to see Woolworths,” Tom Quinn says. The Woolworths buyer took a bottle home and was able to remove a stain from her basin that had been impossible to shift. From that point on, she championed the product and OzKleen had its first super-market order, for a palette of Shower Power worth $3000. “We were over the moon,” says OzKleen’s financial controller, Belinda McDonnell.</p>
                                        <span>E</span><br>
                                        <p class='reading-76'>Shower Power was released in Australian supermarkets in 1997 and became the top-selling product in its category within six months. It was all hands on deck at the factory, labelling and bottling Shower Power to keep up with demand. OzKleen ditched all other products and rebuilt the business around Shower Power. This stage, recalls McDonnell, was very tough. “It was hand-to-mouth, cash flow was very difficult,” she says. OzKleen had to pay new-line fees to supermarket chains, which also squeezed margins.</p>
                                        <span>F</span><br>
                                        <p class='reading-77'>OzKleen’s next big break came when the daughter of a Coles Myer executive 1 used the product while on holidays in Queensland and convinced her father that Shower should be in Coles supermarkets. Despite the product success, Peter Quinn says the company was wary of how long the sales would last and hesitate to spend money on upgrading the manufacturing process. As a result, he remembers long periods of working around the clock to keep up with orders. Small tanks were still being used to batches were small and bottles were labelled and filled manually. The privately owned OzKleen relied on cash-flow to expand. “The equipment could not keep up with demand,” Peter Quinn says. Eventually a new bottling machine was bought for $50,000 in the hope of streamlining production, but he says: “We got ripped off.” Since then he has been developing a new automated bottling machine that can control the amount of foam produced in the liquid, so that bottles can be filled more effectively- “I love coming up with new ideas.” The machine is being patented.  </p>
                                        <span>G</span><br>
                                        <p class='reading-78'>Peter Quinn says OzKleen’s approach to research and development is open slather. “If I need it, I get I it. It is about doing something simple that no one else is doing. Most of these things are just sitting in front of people […] it’s just seeing the opportunities.” With a tried and tested product, OzKleen is expanding overseas and developing more Power-brand household products. Tom Quinn, who previously ran a real estate agency, says: “We are competing with the same market all over the world; the (cleaning) products are sold everywhere.” Shower Power, known as Bath Power in Britain, was launched four years ago with the help of an export development grand from the Federal Government. “We wanted to do it straight away because we realized we had the same opportunities worldwide.” OzKleen is already number three in the British market, and the next stop is France. The power range includes cleaning products for carpets, kitchens and pre-wash stain removal. The Quinn and Heron families are still involved. OzKleen has been approached with offers to buy the company, but Tom Quinn says he is happy with things as they are. “We’re having too much fun.” </p>
                                        ";
                                    ?>
                                    <div class="card-body ps-4">
                                        <p class="question">
                                            SECTION THREE | QUESTIONS 28-40<br>
                                            PASSAGE THREE (Questions 28-40)
                                        </p>

                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <?= $text?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                                                        <p class="question">
                                                            QUESTIONS 39-40<br>
                                                            Choose the correct letter A, B, C or D.    <br>
                                                            Write your answers on your answer sheet.
                                                        </p>

                                                        <?php
                                                            $data_soal_39_40 = [
                                                                [ 
                                                                    "no" => 39, 
                                                                    "soal" => "Tom Quinn changed the bottles size to 750 ml to make Shower Power because it’s….",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> Easier to package.",
                                                                        "<b>B.</b> Appealing to individual customers.",
                                                                        "<b>C.</b> Popular in foreign markets.",
                                                                        "<b>D.</b> Attractive to supermarkets.",
                                                                    ],
                                                                    "name" => "jawaban_reading[38]"
                                                                ],
                                                                [ 
                                                                    "no" => 40, 
                                                                    "soal" => "Why did Tom Quinn decide not to sell OzKleen?",
                                                                    "pilihan" => [
                                                                        "<b>A.</b> No one wanted to buy OzKleen.",
                                                                        "<b>B.</b> New products were being developed in OzKleen.",
                                                                        "<b>C.</b> He couldn’t make an agreement on the price with the buyer.",
                                                                        "<b>D.</b> He wanted to keep things unchanged.",
                                                                    ],
                                                                    "name" => "jawaban_reading[39]"
                                                                ],
                                                            ];
                                                        ?>

                                                        <?php foreach ($data_soal_39_40 as $data_soal) :?>
                                                            <?= soal_pg_ielts($data_soal)?>
                                                        <?php endforeach;?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="btn btn-success btnTransisiTiga">Next<?= tablerIcon("arrow-narrow-right", "me-0")?></a>
                                </div>
                            </div>

                            <div class="sesi-writing" style="display:none">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="question mb-3">
                                            IELTS WRITING TASK ONE<br>
                                            You should spend about 20 minutes on this task 
                                        </p>

                                        <p><i>The graph below shows unemployment rates in the US and Japan from March 1993 to 1999. Summarise the information by selecting and reporting the main features, and make comparisons where relevant.</i></p>
                                        <p>Write at least 150 words.</p>

                                        <img src="<?= base_url()?>assets/img/writing-academic-pretest-001.jpg" alt="">

                                        <span>Type your answer here</span>
                                        <textarea id="textarea-1" class="form-control mb-3" name="text_writing[0]" data-bs-toggle="autosize" placeholder="" style="overflow: hidden scroll; overflow-wrap: break-word; resize: none; height: 56px;"></textarea>
                                        <center>Total word Count : <span id="count-textarea-1">0</span></center>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="question mb-3">
                                            IELTS WRITING TASK TWO<br>
                                            You should spend about 40 minutes on this task<br>
                                        </p>

                                        <table class="table">
                                            <tr>
                                                <td>
                                                    Some people believe that living in big cities is becoming more difficult. Others believe that it is getting easier. Discuss both views and give your own opinion.
                                                </td>
                                            </tr>
                                        </table>

                                        <p>Write at least 250 words.</p>

                                        <span>Type your answer here</span>
                                        <textarea id="textarea-2" class="form-control mb-3" name="text_writing[1]" data-bs-toggle="autosize" placeholder="" style="overflow: hidden scroll; overflow-wrap: break-word; resize: none; height: 56px;"></textarea>
                                        <center>Total word Count : <span id="count-textarea-2">0</span></span></center>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="btn btn-primary btnSimpan">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view("_partials/footer-bar")?>
                </div>
            </div>
        </div>
    </form>

    <?php  
        if(isset($js)) :
            foreach ($js as $i => $js) :?>
                <script src="<?= base_url()?>assets/myjs/<?= $js?>"></script>
                <?php 
            endforeach;
        endif;    
    ?>

<?php $this->load->view("_partials/footer")?>

<script>

    $("#textarea-1").on('keyup', function(e) {
        var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
        // if (words <= 150) {
            $('#count-textarea-1').text(words);
        //     $('#count-left-1').text(150-words)
        // }else{
        //     // Split the string on first 200 words and rejoin on spaces
        //     var trimmed = $(this).val().split(/\s+/, 150).join(" ");
        //     // Add a space at the end to keep new typing making new words
        //     $(this).val(trimmed + " ");
        // }
    });

    $("#textarea-2").on('keyup', function(e) {
        var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
        // if (words <= 250) {
            $('#count-textarea-2').text(words);
        //     $('#count-left-2').text(250-words)
        // }else{
        //     // Split the string on first 200 words and rejoin on spaces
        //     var trimmed = $(this).val().split(/\s+/, 250).join(" ");
        //     // Add a space at the end to keep new typing making new words
        //     $(this).val(trimmed + " ");
        // }
    });

    $('.form-autosize').on('input', function () {
        this.style.width = '60px';
            
        this.style.width = (parseInt((this.scrollWidth)) + parseInt(25))  + 'px';
    });

    $(".btnTransisiSatu").click(function(){
        var first_name = $("[name='first_name']").val();
        var last_name = $("[name='last_name']").val();
        var email = $("[name='email']").val();
        var id_tes = $("[name='id_tes']").val();

        if(first_name == "" || last_name == "" || email == ""){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi data terlebih dahulu',
            })
        } else {

            // cek email 
            var email = ajax(url_base+"soal/cek_email", "POST", {id_tes: id_tes, email: email});

            if(email == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Email Anda telah digunakan',
                })
            } else {
                $("#login").hide();
                $("#transisi-sesi-1").show();

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
            }
        }

    })

    $(".btnTransisiDua").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Once you close, you cannot open the previous section',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                clearInterval(countDown);

                $("#soal_tes").hide();
                $("#transisi-sesi-2").show();

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }

                var audios = document.getElementsByTagName('audio');  
                for(var i = 0, len = audios.length; i < len;i++){  
                    if(audios[i]){  
                        audios[i].pause();  
                    }  
                }
            }
        })
    })

    $(".btnTransisiTiga").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Once you close, you cannot open the previous section',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                clearInterval(countDown);

                $("#soal_tes").hide();
                $("#transisi-sesi-3").show();

                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
            }
        })
    })

    $(".btnListening").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Start the session now?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                $("#transisi-sesi-1").hide();
                $("#soal_tes").show();
                $(".sesi-listening").show();
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
        
                // clearInterval(countDown);
                
                sec = 40 * 60;
                // sec = 30;
        
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass("sesi-listening");
                }, 1000);
            }
        })
    })

    $(".btnReading").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Start the session now?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                $("#transisi-sesi-2").hide();
                $("#soal_tes").show();
                $(".sesi-listening").hide();
                $(".sesi-reading").show();
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
        
                clearInterval(countDown);

                sec = 60 * 60;
                // sec = 40;
        
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass("sesi-reading");
                }, 1000);
            }
        })
    })

    $(".btnWriting").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Start the session now?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                $("#transisi-sesi-3").hide();
                $("#soal_tes").show();
                $(".sesi-listening").hide();
                $(".sesi-reading").hide();
                $(".sesi-writing").show();
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }
        
                clearInterval(countDown);

                sec = 60 * 60;
                // sec = 40;
        
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass("sesi-writing");
                }, 1000);
            }
        })
    })

    $(".btnSimpan").click(function(){
        Swal.fire({
            icon: 'question',
            html: 'Finish the test?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                swal.fire({
                    html: '<h4>Submit your answer ...</h4>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });

                $(".btnSimpan").html("Saving...");
                $(".btnSimpan").prop("disabled", true);
                $("#formIelts").submit()
            }
        })
    })

    $('input:radio').click(function () {
        let id = $(this).data("id");
        let value = $(this).val();

        $(`[name="`+id+`"]`).val(value);
    });

    function secpass(id) {
        'use strict';
        var min = Math.floor(sec / 60),
        remSec  = sec % 60;
        if (remSec < 10) {
            remSec = '0' + remSec;
        }
        if (min < 10) {
            min = '0' + min;
        }

        countDiv.innerHTML = min + ":" + remSec;
        if (sec > 0) {
            sec = sec - 1;
        } else {
            if(id == 'sesi-listening'){
                clearInterval(countDown);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Time out',
                    allowOutsideClick: false,
                }).then(function (result) {
                    
                    $("#soal_tes").hide();
                    $("#transisi-sesi-2").show();

                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#elementtoScrollToID").offset().top
                        }, 1000);
                    }
                    
                })
            } else if(id == 'sesi-reading'){
                clearInterval(countDown);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Time out',
                    allowOutsideClick: false,
                }).then(function (result) {
                    
                    $("#soal_tes").hide();
                    $("#transisi-sesi-3").show();

                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#elementtoScrollToID").offset().top
                        }, 1000);
                    }
                    
                })
            } else if(id == 'sesi-writing'){
                clearInterval(countDown);

                // scroll to top 
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }

                swal.fire({
                    title: 'Time out',
                    html: '<h4>Submit your answer ...</h4>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });

                $(".btnSimpan").html("Saving...");
                $(".btnSimpan").prop("disabled", true);
                $(".btnBack").prop("disabled", true);
                $("#formIelts").submit()
            }
        }
    }

    for (let i = 1; i < 150; i++) {
        // var words = $( ".reading-"+i).first().text().split( /\s+/ );
        var words = $( ".reading-"+i).first().text().split(" ");
        var text = words.join( "</span> <span>" );

        text = text.replace("()", "<i>");
        text = text.replace("(*)", "</i>");

        text = text.replace("((b))", "<b>");
        text = text.replace("((/b))", "</b>");
        
        text = text.replace("((u))", "<u>");
        text = text.replace("((/u))", "</u>");

        $( ".reading-"+i ).first().html( "<span>" + text + "</span>" );
    }

    $( "span" ).on( "click", function() {
        $( this ).toggleClass( "highlight" );
        return false;
    });

    // audio
        $('.audio').on('timeupdate', function() {
            let id = $(this).data("id");
            $('#seekbar-'+id).attr("value", this.currentTime / this.duration);
        });

        $(".btnAudio").click(function(){
            id = $(this).data("id");
            $("#audio-"+id)[0].play();
            $(this).hide();
        })

        document.addEventListener('play', function(e){  
            var audios = document.getElementsByTagName('audio');  
            for(var i = 0, len = audios.length; i < len;i++){  
                if(audios[i] != e.target){  
                    audios[i].pause();  
                }  
            }  
        }, true);
    // audio 

    $("textarea").keydown(function(e) {
        if(e.keyCode === 9) { // tab was pressed
            // get caret position/selection
            var start = this.selectionStart;
                end = this.selectionEnd;

            var $this = $(this);

            // set textarea value to: text before caret + tab + text after caret
            $this.val($this.val().substring(0, start)
                        + "\t"
                        + $this.val().substring(end));

            // put caret at right position again
            this.selectionStart = this.selectionEnd = start + 1;

            // prevent the focus lose
            return false;
        }
    });

</script>