<?= $this->extend('soal/layout/soal_layout') ?>

<?= $this->section('sesi-listening') ?>
    <div class="shadow card mb-3">
        <div class="card-body">
            <center>
            <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('public/assets/myaudio/listening-002.mp3?t='.time())?>" type="audio/mpeg"></audio>
                <progress id="seekbar-1" value="0" max="1" style="width:100%;"></progress><br>
                <button class="btn btn-success btnAudio" data-id="1" type="button"> play</button>
                <p><small class="text-danger"><i>note : The audio can only be played once</i></small></p>
            </center>
        </div>
    </div>

    <div class="shadow card mb-3 soal">
        <div class="card-body ps-4">
            <center><b>IELTS LISTENING</b></center>
            <p class="question">
                    Questions 1-5 <br>
                    Complete the table below <br>
                    Write NO MORE THAN TWO WORDS AND/OR A NUMBER for each answer <br>
            </p>
            <table>

            </table>
            <table class="tableSoal w-100">
                <tr>
                    <td colspan=2><center><b>Thursday October 15th Radio 6</b></center></td>
                </tr>
                <th>Time</th>
                <th>Programme</th>
                <tr>
                    <td>7.00</td>
                    <td>Animal Talk</td>
                </tr>
                <tr>
                    <td><b>1)</b> <?= soal_isian_ielts("jawaban_listening[0]")?></td>
                    <td>Charity broadcast: Rare Species Protection Group</td>
                </tr>
                <tr>
                    <td>8.00</td>
                    <td><b>2)</b> <?= soal_isian_ielts("jawaban_listening[1]")?></td>
                </tr>
                <tr>
                    <td>8.30</td>
                    <td>‘What’s your view? The effects of the <b>3)</b> <?= soal_isian_ielts("jawaban_listening[2]")?></td>
                </tr>
                <tr>
                    <td>9.00</td>
                    <td>News and <b>4)</b> <?= soal_isian_ielts("jawaban_listening[3]")?></td>
                </tr>
                <tr>
                    <td>9.20</td>
                    <td>Book of the week: just-so Stories ‘How the <b>5)</b> <?= soal_isian_ielts("jawaban_listening[4]")?> was written </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="shadow card mb-3">
        <div class="card-body ps-4">
            <p class="question">
                Questions 6-10<br>
                Complete the summary below<br>
                Write NO MORE THAN TWO WORDS AND/OR A NUMBER for each answer<br>
            </p>
            <div class="">
                <p><center><h6>‘Animal Talk’</h6></center></p>
                <p>
                This programme is about communication systems of killer whales and elephants. Both of these are mammals which have strong <b>6)</b> <?= soal_isian_ielts("jawaban_listening[5]")?>, live for a long time and have large <b>7)</b> <?= soal_isian_ielts("jawaban_listening[6]")?>. Killer whales communication mainly through <b>8)</b> <?= soal_isian_ielts("jawaban_listening[7]")?> in the water but little is known about the air in a process which is called <b>9)</b> <?= soal_isian_ielts("jawaban_listening[8]")?> because the message cannot be heard by humans, and they can also receive messages through their <b>10)</b> <?= soal_isian_ielts("jawaban_listening[9]")?>.
                </p>
            </div>
        </div>
    </div>

    <div class="shadow card mb-3">
        <div class="card-body ps-4">
            <p class="question">Question 11-14<br>
                Complete the information below<br>
                Write NO MORE THAN TWO WORDS for each answer
            </p>
            <p>
                <p><b>11)</b> Some parents are worried that the size of <?= soal_isian_ielts("jawaban_listening[10]")?> will be reduced.</p>
                <p><b>12)</b> Any <?= soal_isian_ielts("jawaban_listening[11]")?> that parents give is welcomed.</p>
                <p><b>13)</b> An <?= soal_isian_ielts("jawaban_listening[12]")?> of changes and progress will available each week online.</p>
                <p><b>14)</b> The speaker was keen to balance the need for <?= soal_isian_ielts("jawaban_listening[13]")?> with other school requirements. </p>
            </p>
        </div>
    </div>

    <div class="shadow card mb-3">
        <div class="card-body ps-4">
            <div class="row">
                <div class="col-6">
                    <p class="question">
                        Questions 15-20<br>
                        Label the plan below<br>
                        Choose three answers from the box<br>
                        and write the letter A-I, next to questions 15-20<br>
                    </p>
                    <p>
                        A. Snack bar<br>
                        B. Children’s toilets<br>
                        C. Year 6 classroom<br>
                        D. Bicycle bay<br>
                        E. Nursery <br>
                        F. Staff toilets<br>
                        G. Hall <br>
                        H. Year 5 classroom <br>
                        I. Extra hours facility <br>
                    </p>
                    <p>
                        <b>15)</b> <?= soal_isian_ielts("jawaban_listening[14]")?> 
                        <b>16)</b> <?= soal_isian_ielts("jawaban_listening[15]")?> 
                        <b>17)</b> <?= soal_isian_ielts("jawaban_listening[16]")?> 
                        <b>18)</b> <?= soal_isian_ielts("jawaban_listening[17]")?> 
                        <b>19)</b> <?= soal_isian_ielts("jawaban_listening[18]")?> 
                        <b>20)</b> <?= soal_isian_ielts("jawaban_listening[19]")?>
                    </p>
                </div>
                <div class="col-6">
                    <img src="<?= base_url()?>public/assets/img-soal/gambar_15_20.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="shadow card mb-3">
        <div class="card-body ps-4">
            <p class="question">
                Questions 21-25<br>
                <i>You will hear a woman called Phoebe, who is training to be a teacher, talking to her tutor, called Tony, about research she has done in a school. </i><br>
                Mark the correct letter A,B,or C
            </p>

            <?php
                $data_soal_21_25  = [
                    [
                        "no" => 21,
                        "soal" => "Phoebe’s main reason for choosing her topic was that",
                        "pilihan" => [
                            "<b>A.</b> her classmate had been very interested in it",
                            "<b>B.</b> it would help prepare her for her first teaching post",
                            "<b>C.</b> she had been inspired by a particular book"
                        ],
                        "name" => "jawaban_listening[20]"
                    ],
                    [
                        "no" => 22,
                        "soal" => "Phoebe’s main research question relate to ",
                        "pilihan" => [
                            "<b>A.</b> the effect of teacher discipline",
                            "<b>B.</b> the variety of learning activities",
                            "<b>C.</b> levels of pupil confidence"
                        ],
                        "name" => "jawaban_listening[21]"
                    ],
                    [
                        "no" => 23,
                        "soal" => "Phoebe was most surprised by her finding that",
                        "pilihan" => [
                            "<b>A.</b> gender did not influence behavior significantly",
                            "<b>B.</b> girls were more negative about school than boys",
                            "<b>C.</b> boys were more talkative than girls in class"
                        ],
                        "name" => "jawaban_listening[22]"
                    ],
                    [
                        "no" => 24,
                        "soal" => "Regarding teaching. Phoebe says she has learned that",
                        "pilihan" => [
                            "<b>A.</b> teachers should be flexible in unpredictable ways",
                            "<b>B.</b> brighter children learn from supporting weaker ones",
                            "<b>C.</b> children vary from each other in unpredictable ways"
                        ],
                        "name" => "jawaban_listening[23]"
                    ],
                    [
                        "no" => 25,
                        "soal" => "Tony is particularly impressed by Phoebe’s ability to",
                        "pilihan" => [
                            "<b>A.</b> recognize the limitations of such small-scale research",
                            "<b>B.</b> reflect on her own research experience in an interesting way",
                            "<b>C.</b> design her research in such a way as to minimize difficulties"
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

    <div class="shadow card mb-3">
        <div class="card-body ps-4">
            <p class="question">
                Questions 26-30<br>
                <i>
                    What did Phoebe find difficult about the different research techniques she used?
                    Choose <b>FIVE</b> answers from the box and write the correct letter <b>A-G</b>, next to questions <b>26-30</b>.
                </i>
            </p>
                
            <table class="tableSoal w-100">
                <tr>
                    <td>
                        <b>Difficulties</b><br>
                        <b>A</b> Obtaining permission<br>
                        <b>B</b> Deciding on a suitable focus<br>
                        <b>C</b> Concentrating while gathering data<br>
                        <b>D</b> Working collaboratively<br>
                        <b>E</b> Processing data she had gathered<br>
                        <b>F</b> Finding a suitable time to conduct the research<br>
                        <b>G</b> Getting hold of suitable equipment<br>
                    </td>
                </tr>
            </table>
            <p>
                <p><b>26)</b> <?= soal_isian_ielts("jawaban_listening[25]")?> Observing lessons.</p>
                <p><b>27)</b> <?= soal_isian_ielts("jawaban_listening[26]")?> Interviewing teachers.</p>
                <p><b>28)</b> <?= soal_isian_ielts("jawaban_listening[27]")?> Interviewing pupils.</p>
                <p><b>29)</b> <?= soal_isian_ielts("jawaban_listening[28]")?> Using questionnaires.</p>
                <p><b>30)</b> <?= soal_isian_ielts("jawaban_listening[29]")?> Taking photographs.</p>
            </p>
        </div>
    </div>

    <div class="shadow card mb-3">
        <div class="card-body ps-4">
            <p class="question">
                <b>Questions 31 and 32</b><br>
                Choose the correct letter A, B, or C
            </p>
            
            <?php
                $data_soal_31_32  = [
                    [
                        "no" => 31,
                        "soal" => "The full effects of global warming will",
                        "pilihan" => [
                            "<b>A.</b> be felt right away",
                            "<b>B.</b> devastate the earth very soon",
                            "<b>C.</b> not be known for many, many years"
                        ],
                        "name" => "jawaban_listening[30]"
                    ],
                    [
                        "no" => 32,
                        "soal" => "Climate change will make",
                        "pilihan" => [
                            "<b>A.</b> an existing problem even worse",
                            "<b>B.</b> the earth a more comfortable place to live",
                            "<b>C.</b> it possible to grow more food for people"
                        ],
                        "name" => "jawaban_listening[31]"
                    ],
                ];
            ?>

            <?php foreach ($data_soal_31_32 as $data_soal) :?>
                <?= soal_pg_ielts($data_soal)?>
            <?php endforeach;?>

        </div>
    </div>

    <div class="shadow card mb-3">
        <div class="card-body ps-4">
            <p class="question">
                Questions 33-40<br>
                Complete the notes below<br>
                Write ONE WORD OR A NUMBER for each answer<br>
            </p>

            <div class="mb-3">
                <b>Some statistics about water:</b><br>
                (a) Of all the water on the planet, less than <b>33)</b> <?= soal_isian_ielts("jawaban_listening[32]")?> % is freshwater good for drinking.<br>
                (b) Two-thirds of that water is locked up in ice <b>34)</b> <?= soal_isian_ielts("jawaban_listening[33]")?> and Antarctica.<br>
                (c) Accessible freshwater comes from takes, rivers, underground, aquifers, rain and <b>35)</b> <?= soal_isian_ielts("jawaban_listening[34]")?>.<br>
            </div>

            <div class="mb-3">
                <b>Uneven distribution across the world: </b><br>
                (a) Canada has 0.5% of the world’s people, but 10% of the world’s <b>36)</b> <?= soal_isian_ielts("jawaban_listening[35]")?>.<br>
                (b) Brazil has 3% of the world’s people and <b>37)</b> <?= soal_isian_ielts("jawaban_listening[36]")?>% of freshwater in the world.<br>
            </div>

            <div class="mb-3">
                <b>Poor water management:</b><br>
                (a) Raising <b>38)</b> <?= soal_isian_ielts("jawaban_listening[37]")?> is very water-intensive, requiring about fifteen tons of water for one kilogram of meat. <br>
                (b) Getting water from far-off places takes <b>39)</b> <?= soal_isian_ielts("jawaban_listening[38]")?> away from school and other productive work. <br>
                (c) Desalination plants can convert seawater into fresh water, but are very <b>40)</b> <?= soal_isian_ielts("jawaban_listening[39]")?> to operate and maintain. <br>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('sesi-reading')?>
    <?php
        $text = "
            <h6><center>Climate Change and the Inuit</center></h6><br>
            <center>The threat posed by climate change in the Arctic and the problems faced by Canada's Inuit people</center><br>
            
            <p class='question'>
                <b>Questions 1-14</b><br>
                <i>Read the text below and answer questions 1 - 14. You should spend about 20 minutes on Questions 1-14, which are based on reading passage I below.</i>
            </p>
            
            <p class='reading-1'>{A} Unusual incidents are being reported across the Arctic. Inuit families going off on snowmobiles to prepare their summer hunting camps have found themselves cut off from home by a sea of mud, following early thaws. There are reports of igloos losing their insulating properties as the snow drips and refreezes, of lakes draining into the sea as permafrost melts, and sea ice breaking up earlier than usual, carrying seals beyond the reach of hunters. Climate change may still be a rather abstract idea to most of us, but in the Arctic it is already having dramatic effects - if summertime ice continues to shrink at its present rate, the Arctic Ocean could soon become virtually ice-free in summer. The knock-on effects are likely to include more warming, cloudier skies, increased precipitation and higher sea levels. Scientists are increasingly keen to find out what's going on because they consider the Arctic the 'canary in the mine' for global warming - a warning of what's in store for the rest of the world. </p>
            <p class='reading-2'>{B} For the Inuit the problem is urgent. They live in precarious balance with one of the toughest environments on earth. Climate change, whatever its causes, is a direct threat to their way of life. Nobody knows the Arctic as well as the locals, which is why they are not content simply to stand back and let outside experts tell them what's happening. In Canada, where the Inuit people are jealously guarding their hard-won autonomy in the country's newest territory, Nunavut, they believe their best hope of survival in this changing environment lies in combining their ancestral knowledge with the best of modern science. This is a challenge in itself. </p>
            <p class='reading-3'>{C} The Canadian Arctic is a vast, treeless polar desert that's covered with snow for most of the year. Venture into this terrain and you get some idea of the hardships facing anyone who calls this home. Farming is out of the question and nature offers meagre pickings. Humans first settled in the Arctic a mere 4,500 years ago, surviving by exploiting sea mammals and fish. The environment tested them to the limits: sometimes the colonists were successful, sometimes they failed and vanished. But around a thousand years ago, one group emerged that was uniquely well adapted to cope with the Arctic environment. These Thule people moved in from Alaska, bringing kayaks, sleds, dogs, pottery and iron tools. They are the ancestors of today's Inuit people. </p>
            <p class='reading-4'>{D} Life for the descendants of the Thule people is still harsh. Nunavut is 1.9 million square kilometres of rock and ice, and a handful of islands around the North Pole. It's currently home to 2,500 people, all but a handful of them indigenous Inuit. Over the past 40 years, most have abandoned their nomadic ways and settled in the territory's 28 isolated communities, but they still rely heavily on nature to provide food and clothing. Provisions available in local shops have to be flown into Nunavut on one of the most costly air networks in the world, or brought by supply ship during the few ice-free weeks of summer. It would cost a family around £7,000 a year to replace meat they obtained themselves through hunting with imported meat. Economic opportunities are scarce, and for many people state benefits are their only income. </p>
            <p class='reading-5'>{E} While the Inuit may not actually starve if hunting and trapping are curtailed by climate change, there has certainly been an impact on people's health. Obesity, heart disease and diabetes are beginning to appear in people for whom these have never before been problems. There has been a crisis of identity as the traditional skills of hunting, trapping and preparing skins have begun to disappear. In Nunavut's 'igloo and email' society, where adults who were born in igloos have children who may never have been out on the land, there's a high incidence of depression. </p>
            <p class='reading-6'>{F} With so much at stake, the Inuit are determined to play a key role in teasing out the mysteries of climate change in the Arctic. Having survived there for centuries, they believe their wealth of traditional knowledge is vital to the task. And Western scientists are starting to draw on this wisdom, increasingly referred to as 'Inuit Qaujimajatuqangit', or IQ. 'In the early days scientists ignored us when they came up here to study anything. They just figured these people don't know very much so we won't ask them,' says John Amagoalik, an Inuit leader and politician. 'But in recent years IQ has had much more credibility and weight.' In fact it is now a requirement for anyone hoping to get permission to do research that they consult the communities, who are helping to set the research agenda to reflect their most important concerns. They can turn down applications from scientists they believe will work against their interests, or research projects that will impinge too much on their daily lives and traditional activities. </p>
            <p class='reading-7'>{G} Some scientists doubt the value of traditional knowledge because the occupation of the Arctic doesn't go back far enough. Others, however, point out that the first weather stations in the far north date back just 50 years. There are still huge gaps in our environmental knowledge, and despite the scientific onslaught, many predictions are no more than best guesses. IQ could help to bridge the gap and resolve the tremendous uncertainty about how much of what we're seeing is natural capriciousness and how much is the consequence of human activity.</p>
        ";
    ?>
    
    <div class="shadow card mb-3">
        <div class="card-body ps-4">
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
                                Questions 1-6<br>
                                <i>Reading passage 1 has seven paragraphs. Choose the correct heading for paragraphs A-F from the list of headings below. Write the correct number i-ix, in boxes 1-6 on your answer sheet. </i>
                            </p>

                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        List of Headings <br>
                                        (I) The reaction of the limit community to climate change <br>
                                        (II) Understanding of climate change remains limited <br>
                                        (III) Alternative sources of essential supplies <br>
                                        (IV) Respect for limit opinion grows <br>
                                        (V) A healthier choice of food <br>
                                        (VI) A difficult landscape <br>
                                        (VII) Negative effects on well-being <br>
                                        (VIII) Alarm caused by unprecedented events in the Arctic <br>
                                        (IX) The benefits of an easier existence <br>
                                    </td>
                                </tr>
                            </table>

                            <p><b>1.</b> Paragraph A <?= soal_isian_ielts("jawaban_reading[0]")?></p>
                            <p><b>2.</b> Paragraph B <?= soal_isian_ielts("jawaban_reading[1]")?></p>
                            <p><b>3.</b> Paragraph C <?= soal_isian_ielts("jawaban_reading[2]")?></p>
                            <p><b>4.</b> Paragraph D <?= soal_isian_ielts("jawaban_reading[3]")?></p>
                            <p><b>5.</b> Paragraph E <?= soal_isian_ielts("jawaban_reading[4]")?></p>
                            <p><b>6.</b> Paragraph F <?= soal_isian_ielts("jawaban_reading[5]")?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $text = "
            <h6><center>Climate Change and the Inuit</center></h6><br>
            <center>The threat posed by climate change in the Arctic and the problems faced by Canada's Inuit people</center><br>
            
            <p class='question'>
                <b>Questions 1-14</b><br>
                <i>Read the text below and answer questions 1 - 14. You should spend about 20 minutes on Questions 1-14, which are based on reading passage I below.</i>
            </p>
            
            <p class='reading-8'>{A} Unusual incidents are being reported across the Arctic. Inuit families going off on snowmobiles to prepare their summer hunting camps have found themselves cut off from home by a sea of mud, following early thaws. There are reports of igloos losing their insulating properties as the snow drips and refreezes, of lakes draining into the sea as permafrost melts, and sea ice breaking up earlier than usual, carrying seals beyond the reach of hunters. Climate change may still be a rather abstract idea to most of us, but in the Arctic it is already having dramatic effects - if summertime ice continues to shrink at its present rate, the Arctic Ocean could soon become virtually ice-free in summer. The knock-on effects are likely to include more warming, cloudier skies, increased precipitation and higher sea levels. Scientists are increasingly keen to find out what's going on because they consider the Arctic the 'canary in the mine' for global warming - a warning of what's in store for the rest of the world. </p>
            <p class='reading-9'>{B} For the Inuit the problem is urgent. They live in precarious balance with one of the toughest environments on earth. Climate change, whatever its causes, is a direct threat to their way of life. Nobody knows the Arctic as well as the locals, which is why they are not content simply to stand back and let outside experts tell them what's happening. In Canada, where the Inuit people are jealously guarding their hard-won autonomy in the country's newest territory, Nunavut, they believe their best hope of survival in this changing environment lies in combining their ancestral knowledge with the best of modern science. This is a challenge in itself. </p>
            <p class='reading-10'>{C} The Canadian Arctic is a vast, treeless polar desert that's covered with snow for most of the year. Venture into this terrain and you get some idea of the hardships facing anyone who calls this home. Farming is out of the question and nature offers meagre pickings. Humans first settled in the Arctic a mere 4,500 years ago, surviving by exploiting sea mammals and fish. The environment tested them to the limits: sometimes the colonists were successful, sometimes they failed and vanished. But around a thousand years ago, one group emerged that was uniquely well adapted to cope with the Arctic environment. These Thule people moved in from Alaska, bringing kayaks, sleds, dogs, pottery and iron tools. They are the ancestors of today's Inuit people. </p>
            <p class='reading-11'>{D} Life for the descendants of the Thule people is still harsh. Nunavut is 1.9 million square kilometres of rock and ice, and a handful of islands around the North Pole. It's currently home to 2,500 people, all but a handful of them indigenous Inuit. Over the past 40 years, most have abandoned their nomadic ways and settled in the territory's 28 isolated communities, but they still rely heavily on nature to provide food and clothing. Provisions available in local shops have to be flown into Nunavut on one of the most costly air networks in the world, or brought by supply ship during the few ice-free weeks of summer. It would cost a family around £7,000 a year to replace meat they obtained themselves through hunting with imported meat. Economic opportunities are scarce, and for many people state benefits are their only income. </p>
            <p class='reading-12'>{E} While the Inuit may not actually starve if hunting and trapping are curtailed by climate change, there has certainly been an impact on people's health. Obesity, heart disease and diabetes are beginning to appear in people for whom these have never before been problems. There has been a crisis of identity as the traditional skills of hunting, trapping and preparing skins have begun to disappear. In Nunavut's 'igloo and email' society, where adults who were born in igloos have children who may never have been out on the land, there's a high incidence of depression. </p>
            <p class='reading-13'>{F} With so much at stake, the Inuit are determined to play a key role in teasing out the mysteries of climate change in the Arctic. Having survived there for centuries, they believe their wealth of traditional knowledge is vital to the task. And Western scientists are starting to draw on this wisdom, increasingly referred to as 'Inuit Qaujimajatuqangit', or IQ. 'In the early days scientists ignored us when they came up here to study anything. They just figured these people don't know very much so we won't ask them,' says John Amagoalik, an Inuit leader and politician. 'But in recent years IQ has had much more credibility and weight.' In fact it is now a requirement for anyone hoping to get permission to do research that they consult the communities, who are helping to set the research agenda to reflect their most important concerns. They can turn down applications from scientists they believe will work against their interests, or research projects that will impinge too much on their daily lives and traditional activities. </p>
            <p class='reading-14'>{G} Some scientists doubt the value of traditional knowledge because the occupation of the Arctic doesn't go back far enough. Others, however, point out that the first weather stations in the far north date back just 50 years. There are still huge gaps in our environmental knowledge, and despite the scientific onslaught, many predictions are no more than best guesses. IQ could help to bridge the gap and resolve the tremendous uncertainty about how much of what we're seeing is natural capriciousness and how much is the consequence of human activity.</p>
        ";
    ?>

    <div class="shadow card mb-3">
        <div class="card-body ps-4">
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
                        <div class="card-body" style="height: 600px; overflow: scroll">
                            <p class="question">
                                Questions 7-14<br>
                                <i>Complete the summary of paragraphs C and D below. Choose NO MORE THAN TWO WORDS from paragraphs C and D for each answer. Write your answers in boxes 7-14 on your answer sheet.</i>
                            </p>

                            If you visit the Canadian Arctic, you immediately appreciate the problems faced by people for whom this is home. It would clearly be impossible for the people to engage in <b>7)</b><?= soal_isian_ielts("jawaban_reading[6]")?> as a means of supporting themselves. For thousands of years they have had to rely on catching <b>8)</b><?= soal_isian_ielts("jawaban_reading[7]")?> and <b>9)</b><?= soal_isian_ielts("jawaban_reading[8]")?> as a means of sustenance. The harsh surroundings saw many who tried to settle there pushed to their limits, although some were successful. The <b>10)</b><?= soal_isian_ielts("jawaban_reading[9]")?> people were an example of the latter and for them the environment did not prove unmanageable. For the present inhabitants, life continues to be a struggle. The territory of Nunavut consists of little more than ice, rock and a few <b>11)</b><?= soal_isian_ielts("jawaban_reading[10]")?> In recent years, many of them have been obliged to give up their <b>12)</b><?= soal_isian_ielts("jawaban_reading[11]")?> lifestyle, but they continue to depend mainly on <b>13)</b><?= soal_isian_ielts("jawaban_reading[12]")?> for their food and clothes. <b>14)</b><?= soal_isian_ielts("jawaban_reading[13]")?> product is particularly expensive.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        $text = "
            <p class='question'>
                QUESTIONS 15-20<br>
                <i>Complete the flow-chart below.</i><br>
                <i>Write <b>NO MORE THAN TWO WORDS</b> from the passage for each answer</i><br>
                Important events in Ray Harryhausen’s career
            </p>
            
            <h6><center>Ray Harryhausen</center></h6>
            
            <p class='reading-15'>After cramming the first thirteen years of his life with every dinosaur book and mythical illustration that he could lay eyes on, Ray Harryhausen went to see ()King&nbsp;Kong(*) with his aunt and parents. Upon witnessing the cutting edge special effects, the boy flew into a new obsession full-force, tracking down everything he could find that would solve the mystery, &quot;How did they make it move like that?&quot; Once he discovered the answer in stop-motion animation, he dedicated himself to the hobby.</p>

            <p class='reading-16'>At the age of eighteen, he could be seen daily in his mother's garden, forcing a video camera to film stop-motion animation of a wood-framed stegosaurus, a brontosaurus, and a bear he had fashioned from clay and fabric. This experiment, his first ever animated film, took months to complete. When finally he got to see his little movie, he found that the film was an utter failure. After hours of painstaking, meticulous work, Harryhausen's results were a spotty, jerking animation with shadows flitting in every direction as the sun moved.</p>

            <p class='reading-17'>More than any other moment in his life, Harryhausen's response to this failure revealed his work ethic. When artists have racked up a certain amount of success, they can frequently recover from a failure. By then, they have plenty of evidence to prove to themselves that they are good at their work. But, when a beginner like Harryhausen's first, arduous step proves only that he is an artist of disaster, the ability to move forward is more than just perseverance; it has a sense of pioneer spirit, of heroism.</p>

            <p class='reading-18'>When Harryhausen watched the terrible film, he made the hero's decision. He tried again. This time, he moved his &quot;studio&quot; inside the garage so that the sun's movement would not change the lighting. This time, he used a camera that had a one-frame shot feature. This time, the results were much improved. The only drawback was that his father had to park in the driveway for months while Harryhausen filmed. Without a studio to back his project financially or even an audience outside of his supportive mother and father, Harryhausen labored long hours over an ambitious project called ()Evolution&nbsp;of&nbsp;the&nbsp;World(*).</p>

            <p class='reading-19'>During work on his amateur project, Harryhausen met Willis O'Brien, the mastermind behind ()King&nbsp;Kong(*). The young man brought a hand-made model of a brontosaurus to the meeting. The sculpture had won him a prize less than a year before. But, for O'Brien, it was inadequate. After comparing the legs of the sculpture to overcooked sausages, he told Harryhausen to study anatomy. Surprisingly, Harryhausen was less insulted than grateful. In the following months, Harryhausen could be found whiling away hours at the zoo, carefully observing the animals. The elephant’s knees, the giraffe’s stride, the kangaroo's leap taught Harryhausen the subtleties of natural movement. He brought his old question with him: How did they move?</p>

            <p class='reading-20'>Not long after his visit with O'Brien, Harryhausen landed his first professional position in cinema: puppeteer at Puppetoons, a stop-motion cartoon studio. The project gave him the opportunity to animate using stop-motion in a professional setting, but the rigidity of the puppets’ motions left him uninspired. After dedicating years to understanding realistic movement, Harryhausen had a sense that he was taking a few steps backward as an artist. With just few years at Puppetoons under his belt, he decided to move on. Leaving the commercial film industry, he joined the Army in the Special Services division to create films for military orientation.</p>

            <p class='reading-21'>After this, Harryhausen had a moderately impressive resume that created inroads into artistically interesting films. His former mentor O'Brien  reached out and offered him a position as an assistant on his new film, ()Mighty&nbsp;Joe&nbsp;Young(*), a sequel to ()King&nbsp;Kong(*). This giving Harryhausen the chance to finally see firsthand the answer to his old question, &quot;How do they make it move like that?&quot; Over the course of this movie and the next, Harryhausen began experimenting with ways of separating the background and foreground of the film in live action animated sequences in order to incorporate stop-motion animated models more realistically. The results stunned audiences.</p>

            <p class='reading-22'>Throughout a dozen films between 1940 and 1957, Harryhausen's constantly improving special effects brought dinosaurs and giants and even a Cyclops into realistic interactions with live actors. At the height of complexity, ()Jason&nbsp;and&nbsp;the&nbsp;Argonauts(*) featured a band of seven skeletons in a elaborately choreographed sword fight with three living men. The sequence took months to complete. It remains one of the most lauded accomplishments in special effects history, analysed by college film students even today, and remembered as Harryhausen’s greatest cinematic achievement.</p>

            <p class='reading-23'>Harryhausen's popularity waxed and waned over the course of his career, but his abilities did not. As long as he contributed to films, he continued striving to improve upon his previous techniques, moving flawlessly from black and white films to colour, from ancient monsters to futuristic aliens. Upon Harryhausen's death in 2013, modern film directors and special effects designers like Peter Jackson and Steven Spielberg flooded the news with statements of admiration toward the man who inspired their imaginations so much, simply by pursuing the question, &quot;How did they make it move?&quot;</p>
        ";
    ?>

    <div class="card shadow mb-3">
        <div class="card-body ps-4">
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

                        <?php 
                            $arrow = '<center>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                        </svg>
                                    </center>';
                        ?>

                        <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                            <p class="question">
                                Questions 15-20<br>
                                <i>Complete the flow-chart below.</i><br>
                                <i>Write NO MORE THAN TWO WORDS from the passage for each answer</i><br>
                                Important events in Ray Harryhausen’s career<br>
                            </p>
                            <table class="tableTes w-100">
                                <tr>
                                    <td>
                                        At the age of 18, Ray Harryhausen made a film he considered to be a <b>15)</b> <?= soal_isian_ielts("jawaban_reading[14]")?>
                                    </td>
                                </tr>
                            </table>
                            
                            <?= $arrow;?>

                            <table class="tableTes w-100">
                                <tr>
                                    <td>
                                        Then, he made a second movie in his <b>16)</b> <?= soal_isian_ielts("jawaban_reading[15]")?>, entitled <i>Evolution of the World.</i>
                                    </td>
                                </tr>
                            </table>

                            <?= $arrow;?>

                            <table class="tableTes w-100">
                                <tr>
                                    <td>
                                        To improve, Harryhausen carefully observed the <b>17)</b> <?= soal_isian_ielts("jawaban_reading[16]")?> of different kinds of animals.
                                    </td>
                                </tr>
                            </table>

                            <?= $arrow;?>

                            <table class="tableTes w-100">
                                <tr>
                                    <td>
                                        After improving his skills on his own films, he got a job controlling the motion of <b>18)</b> <?= soal_isian_ielts("jawaban_reading[17]")?> at a company that made cartoons.
                                    </td>
                                </tr>
                            </table>

                            <?= $arrow;?>

                            <table class="tableTes w-100">
                                <tr>
                                    <td>
                                        After his cartoon work, Ray Harryhausen worked for the military, making orientation movies in the Army's <b>19)</b> <?= soal_isian_ielts("jawaban_reading[18]")?> department.
                                    </td>
                                </tr>
                            </table>

                            <?= $arrow;?>

                            <table class="tableTes w-100">
                                <tr>
                                    <td>
                                        Harryhausen creates a scene depicting skeletons engaged in a <b>20)</b> <?= soal_isian_ielts("jawaban_reading[19]")?>, which is now regarded as an important piece of movie history.
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $text = "
        <p class='question'>
            Questions 21-33<br>
            <i>Read the passage and answer questions 21-33</i><br>
        </p>
        
        <div>
            <h6><center>Making Time for Science</center></h6><br>
            
            <p class='reading-24'>Chronobiology might sound a little futuristic – like something from a science fiction novel, perhaps – but it’s actually a field of study that concerns one of the oldest processes life on this planet has ever known: short-term rhythms of time and their effect on flora and fauna.</p>

            <p class='reading-25'>This can take many forms. Marine life, for example, is influenced by tidal patterns. Animals tend to be active or inactive depending on the position of the sun or moon. Numerous creatures, humans included, are largely diurnal – that is, they like to come out during the hours of sunlight. Nocturnal animals, such as bats and possums, prefer to forage by night. A third group are known as crepuscular: they thrive in the low-light of dawn and dusk and remain inactive at other hours.</p>

            <p class='reading-26'>When it comes to humans, chronobiologists are interested in what is known as the circadian rhythm. This is the complete cycle our bodies are naturally geared to undergo within the passage of a twenty-four hour day. Aside from sleeping at night and waking during the day, each cycle involves many other factors such as changes in blood pressure and body temperature. Not everyone has an identical circadian rhythm. ‘Night people’, for example, often describe how they find it very hard to operate during the morning, but become alert and focused by evening. This is a benign variation within circadian rhythms known as a chronotype.</p>

            <p class='reading-27'>Scientists have limited abilities to create durable modifications of chronobiological demands. Recent therapeutic developments for humans such as artificial light machines and melatonin administration can reset our circadian rhythms, for example, but our bodies can tell the difference and health suffers when we breach these natural rhythms for extended periods of time. Plants appear no more malleable in this respect; studies demonstrate that vegetables grown in season and ripened on the tree are far higher in essential nutrients than those grown in greenhouses and ripened by laser.</p>

            <p class='reading-28'>Knowledge of chronobiological patterns can have many pragmatic implications for our day-to-day lives. While contemporary living can sometimes appear to subjugate biology – after all, who needs circadian rhythms when we have caffeine pills, energy drinks, shift work and cities that never sleep? – keeping in synch with our body clock is important. </p>

            <p class='reading-29'>The average urban resident, for example, rouses at the eye-blearing time of 6.04 a.m., which researchers believe to be far too early. One study found that even rising at 7.00 a.m. has deleterious effects on health unless exercise is performed for 30 minutes afterward. The optimum moment has been whittled down to 7.22 a.m.; muscle aches, headaches and moodiness were reported to be lowest by participants in the study who awoke then.</p>

            <p class='reading-30'>Once you’re up and ready to go, what then? If you’re trying to shed some extra pounds, dieticians are adamant: never skip breakfast. This disorients your circadian rhythm and puts your body in starvation mode. The recommended course of action is to follow an intense workout with a carbohydrate-rich breakfast; the other way round and weight loss results are not as pronounced.</p>
            
            <p class='reading-31'>Morning is also great for breaking out the vitamins. Supplement absorption by the body is not temporal-dependent, but naturopath Pam Stone notes that the extra boost at breakfast helps us get energised for the day ahead. For improved absorption, Stone suggests pairing supplements with a food in which they are soluble and steering clear of caffeinated beverages. Finally, Stone warns to take care with storage; high potency is best for absorption, and warmth and humidity are known to deplete the potency of a supplement.</p>

            <p class='reading-32'>After-dinner espressos are becoming more of a tradition – we have the Italians to thank for that – but to prepare for a good night’s sleep we are better off putting the brakes on caffeine consumption as early as 3 p.m. With a seven hour half-life, a cup of coffee containing 90 mg of caffeine taken at this hour could still leave 45 mg of caffeine in your nervous system at ten o’clock that evening. It is essential that, by the time you are ready to sleep, your body is rid of all traces.</p>
            
            <p class='reading-33'>Evenings are important for winding down before sleep; however, dietician Geraldine Georgeou warns that an after-five carbohydrate-fast is more cultural myth than chronobiological demand. This will deprive your body of vital energy needs. Overloading your gut could lead to indigestion, though. Our digestive tracts do not shut down for the night entirely, but their work slows to a crawl as our bodies prepare for sleep. Consuming a modest snack should be entirely sufficient.</p>
        </div>
    ";?>

    <div class="card shadow mb-3">
        <div class="card-body ps-4">
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

                        <?php 
                            // $arrow = '<center>'.tablerIcon("arrow-narrow-down", "mb-1 mt-1").'</center>';
                        ?>

                        <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                            <p class="question">
                                Questions 21-27<br>
                                <i>Do the following statements agree with the information given in the text? In boxes on your answer sheet, write</i>
                            </p>

                            <table class="tableTes w-100 mb-3">
                                <tr>
                                    <td>TRUE</td>
                                    <td>If the statement is True</td>
                                </tr>
                                <tr>
                                    <td>FALSE</td>
                                    <td>If the statement is False</td>
                                </tr>
                                <tr>
                                    <td>NOT GIVEN</td>
                                    <td>If the information is Not Given in the passage</td>
                                </tr>
                            </table>

                            <?php 
                            
                                $data_soal_21_27 = [
                                    [
                                        "no" => 21,
                                        "soal" => "Chronobiology is the study of how living things have evolved over time",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[20]"
                                    ],
                                    [
                                        "no" => 22,
                                        "soal" => "The rise and fall of sea levels affects how sea creatures behave",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[21]"
                                    ],
                                    [
                                        "no" => 23,
                                        "soal" => "Most animals are active during the daytime",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[22]"
                                    ],
                                    [
                                        "no" => 24,
                                        "soal" => "Circadian rhythms identify how we do different things on different days",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[23]"
                                    ],
                                    [
                                        "no" => 25,
                                        "soal" => "A ‘night person’ can still have a healthy circadian rhythm",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[24]"
                                    ],
                                    [
                                        "no" => 26,
                                        "soal" => "New therapies can permanently change circadian rhythms without causing harm",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[25]"
                                    ],
                                    [
                                        "no" => 27,
                                        "soal" => "Naturally-produced vegetables have more nutritional value",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[26]"
                                    ],
                                ];

                                foreach ($data_soal_21_27 as $data_soal) :?>
                                    <?= soal_pg_ielts($data_soal);?>
                                <?php endforeach;?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $text = "
        <p class='question'>
            Questions 21-33<br>
            <i>Read the passage and answer questions 21-33</i><br>
        </p>
        
        <div>
            <h6><center>Making Time for Science</center></h6><br>
            
            <p class='reading-34'>Chronobiology might sound a little futuristic – like something from a science fiction novel, perhaps – but it’s actually a field of study that concerns one of the oldest processes life on this planet has ever known: short-term rhythms of time and their effect on flora and fauna.</p>

            <p class='reading-35'>This can take many forms. Marine life, for example, is influenced by tidal patterns. Animals tend to be active or inactive depending on the position of the sun or moon. Numerous creatures, humans included, are largely diurnal – that is, they like to come out during the hours of sunlight. Nocturnal animals, such as bats and possums, prefer to forage by night. A third group are known as crepuscular: they thrive in the low-light of dawn and dusk and remain inactive at other hours.</p>

            <p class='reading-36'>When it comes to humans, chronobiologists are interested in what is known as the circadian rhythm. This is the complete cycle our bodies are naturally geared to undergo within the passage of a twenty-four hour day. Aside from sleeping at night and waking during the day, each cycle involves many other factors such as changes in blood pressure and body temperature. Not everyone has an identical circadian rhythm. ‘Night people’, for example, often describe how they find it very hard to operate during the morning, but become alert and focused by evening. This is a benign variation within circadian rhythms known as a chronotype.</p>

            <p class='reading-37'>Scientists have limited abilities to create durable modifications of chronobiological demands. Recent therapeutic developments for humans such as artificial light machines and melatonin administration can reset our circadian rhythms, for example, but our bodies can tell the difference and health suffers when we breach these natural rhythms for extended periods of time. Plants appear no more malleable in this respect; studies demonstrate that vegetables grown in season and ripened on the tree are far higher in essential nutrients than those grown in greenhouses and ripened by laser.</p>

            <p class='reading-38'>Knowledge of chronobiological patterns can have many pragmatic implications for our day-to-day lives. While contemporary living can sometimes appear to subjugate biology – after all, who needs circadian rhythms when we have caffeine pills, energy drinks, shift work and cities that never sleep? – keeping in synch with our body clock is important. </p>

            <p class='reading-39'>The average urban resident, for example, rouses at the eye-blearing time of 6.04 a.m., which researchers believe to be far too early. One study found that even rising at 7.00 a.m. has deleterious effects on health unless exercise is performed for 30 minutes afterward. The optimum moment has been whittled down to 7.22 a.m.; muscle aches, headaches and moodiness were reported to be lowest by participants in the study who awoke then.</p>

            <p class='reading-40'>Once you’re up and ready to go, what then? If you’re trying to shed some extra pounds, dieticians are adamant: never skip breakfast. This disorients your circadian rhythm and puts your body in starvation mode. The recommended course of action is to follow an intense workout with a carbohydrate-rich breakfast; the other way round and weight loss results are not as pronounced.</p>
            
            <p class='reading-41'>Morning is also great for breaking out the vitamins. Supplement absorption by the body is not temporal-dependent, but naturopath Pam Stone notes that the extra boost at breakfast helps us get energised for the day ahead. For improved absorption, Stone suggests pairing supplements with a food in which they are soluble and steering clear of caffeinated beverages. Finally, Stone warns to take care with storage; high potency is best for absorption, and warmth and humidity are known to deplete the potency of a supplement.</p>

            <p class='reading-42'>After-dinner espressos are becoming more of a tradition – we have the Italians to thank for that – but to prepare for a good night’s sleep we are better off putting the brakes on caffeine consumption as early as 3 p.m. With a seven hour half-life, a cup of coffee containing 90 mg of caffeine taken at this hour could still leave 45 mg of caffeine in your nervous system at ten o’clock that evening. It is essential that, by the time you are ready to sleep, your body is rid of all traces.</p>
            
            <p class='reading-43'>Evenings are important for winding down before sleep; however, dietician Geraldine Georgeou warns that an after-five carbohydrate-fast is more cultural myth than chronobiological demand. This will deprive your body of vital energy needs. Overloading your gut could lead to indigestion, though. Our digestive tracts do not shut down for the night entirely, but their work slows to a crawl as our bodies prepare for sleep. Consuming a modest snack should be entirely sufficient.</p>
        </div>
    ";?>

    <div class="card shadow mb-3">
        <div class="card-body ps-4">
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

                        <?php 
                            // $arrow = '<center>'.tablerIcon("arrow-narrow-down", "mb-1 mt-1").'</center>';
                        ?>

                        <div class="card-body ps-4" style="height: 600px; overflow: scroll">
                            <p class="question">
                                Questions 28-33<br>
                                <i>Choose the correct letter, A, B, C or D</i>
                            </p>

                            <?php 
                            
                            $data_soal_28_33 = [
                                [
                                    "no" => 28,
                                    "soal" => "What did researchers identify as the ideal time to wake up in the morning?",
                                    "pilihan" => ["A. 6.04", "B. 7.00", "C. 7.22", "D. 7.30"],
                                    "name" => "jawaban_reading[27]"
                                ],
                                [
                                    "no" => 29,
                                    "soal" => "In order to lose weight, we should:",
                                    "pilihan" => ["A. Avoid eating breakfast","B. Eat a low carbohydrate breakfast","C. Exercise before breakfast","D. Exercise after breakfast"],
                                    "name" => "jawaban_reading[28]"
                                ],
                                [
                                    "no" => 30,
                                    "soal" => "Which is NOT mentioned as a way to improve supplement absorption? ",
                                    "pilihan" => [
                                        "A. Avoiding drinks containing caffeine while taking supplements",
                                        "B. Taking supplements at breakfast",
                                        "C. Taking supplements with foods that can dissolve them",
                                        "D. Storing supplements in a cool, dry environment ",
                                    ],
                                    "name" => "jawaban_reading[29]"
                                ],
                                [
                                    "no" => 31,
                                    "soal" => "The best time to stop drinking coffee is ",
                                    "pilihan" => [
                                        "A. Mid-afternoon ",
                                        "B. 10 PM ",
                                        "C. Only when feeling anxious",
                                        "D. After dinner",
                                    ],
                                    "name" => "jawaban_reading[30]"
                                ],
                                [
                                    "no" => 32,
                                    "soal" => "In the evening, we should:",
                                    "pilihan" => [
                                        "A. Stay away from carbohydrates",
                                        "B. Stop exercising",
                                        "C. Eat as much as possible",
                                        "D. Eat a light meal ",
                                    ],
                                    "name" => "jawaban_reading[31]"
                                ],
                                [
                                    "no" => 33,
                                    "soal" => "Which of the following phrases best describes the main aim of the passage? ",
                                    "pilihan" => [
                                        "A. To suggest healthier ways of eating, sleeping, and exercising",
                                        "B. To describe how modern life has made chronobiology largely irrelevant",
                                        "C. To introduce chronobiology and describe some practical applications",
                                        "D. To plan a daily schedule that can alter out our natural chronobiological rhythms.",
                                    ],
                                    "name" => "jawaban_reading[32]"
                                ]
                            ];

                            foreach ($data_soal_28_33 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal);?>
                            <?php endforeach;?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $text = "
            <p class='question'>
                Questions 34-40<br>
                <i>Read the passage and answer questions 34-40</i>
            </p>
            
            <h6><center>MICROALGAE</center></h6>
            
            <p class='reading-44'>Microalgae has been touted for the last few decades as a panacea for the world’s energy crisis, specifically our dependency on oil. At first, there was good reason to be optimistic. Compared to other biofuels, microalgae promises to be highly efficient based on its yield, as defined by the biomass in a given unit of surface area (5 to 10 grams of biomass per meter squared of surface area is typical.) Additionally, microalgae is relatively easy to produce because it can be harvested in a natural environment similar to the one in which it grows (microalgae can flourish in ponds one feet deep). The oil content in microalgae is also extremely high compared to other crops. Studies indicate that approximately 15,000 square miles, or roughly half the size of Maine, is required to sustain all the microalgae needed for the U.S. energy needs for an entire year. Nevertheless, microalgae has yet to become a viable commercial alternative to fossil fuels mainly because of the costs of providing for even a small biomass. Regardless of the method used, problems include the difficulty of ensuring that the same species thrives in a given culture (other species can form a colour gradient leading to a difficulty in photosynthesis and a reduction in output) and the relatively low yield of algal oil when used as a biofuel.</p>

            <p class='reading-45'>Microalgae has been used successfully to deal with other environment-related issues. As one example, microalgae can be grown in ponds where it can collect runoff fertiliser; this “fertiliser-enhanced” microalgae can then be used as fertiliser, thereby leading to a reduction in overall crop-production costs. Other uses of microalgae relate to eco-efficiency, meaning that it helps reduce the negative environmental impact that inevitably results from certain industrial processes. For example, microalgae can be used in water-treatment facilities to limit the amount of chemicals needed. More significantly, microalgae is able to absorb the CO2 emissions from coal factories, one of the world’s most commonly used fossil fuels, and one that is most damaging to the environment. Again, convenience explains much of microalgae’s appeal; in this case, a microalgae farm needs to be placed in close proximity to coal-producing plant to absorb much of the CO2 emissions.</p>

            <p class='reading-46'>Because of such multifaceted uses, microalgae have continued to be part of the conversation around biofuel production over the last several decades, despite the lack of any innovations in microalgae production that might lead to a viable commercial product.  The best-established methods of traditional microalgeal oil harvesting, centrifugation, filtration, and flocculation, all have issues with cost and efficiency. Centrifugation requires the rapid rotation of water containing microalgae, via a spinning motor which consumes energy at a high rate. Filtration is not-so energy intensive, but only larger species of microalgae can be caught in filters for the purposes of oil separation. Flocculation, the adding of chemicals in the algae to separate them from both water and oil through a sedimentation process in which the microalgae sinks to the bottom of the water, poses a different problem: the chemicals, once added, make the energy yield of the oil much lower, and flocculation agents are very hard to remove after the fact.  While it might be easy to be skeptical of any new innovations and discount microalgae as a perennial allurement, a number of recent breakthroughs are showing a far more promising path to full-scale viability.</p>

            <p class='reading-47'>Perhaps the most promising method of utilising microalgae’s biofuel potential is “floatation harvesting,” in large part because of its low energy cost and ease of maintenance. Other methods require frequent harvesting and are known to researchers as being “extensive and expensive”. Floatation, by contrast, involves the creation and injection of microscopic gas bubbles that stick to destabilised molecules in the microalgae, “pulling” these molecules to the surface to form a concentrate. The efficiency of floatation is also aided by the effect of gravity, which pulls water from the concentrate. In this sense, floatation is an inversion of sedimentation; floatation is preferable in that it works in conjunction with nature, since microalgae tends to float rather than settle, thereby requiring far less oversight yet leading to a thicker microalgeal concentrate.</p>

            <p class='reading-48'>Given the history of converting microalgae into a biofuel, researchers are reluctant to hail floatation as the “magic bullet” that has long eluded scientists. In addition to the problems outlined above, researchers cite several other issues, including the reduction of efficacy when diverse species of microalgae are present and the need for coagulants to neutralise the surface charge of microalgae to make it hydrophobic, so as to prevent toxicity of the biomass.</p>
        ";
    ?>

    <div class="card shadow mb-3">
        <div class="card-body ps-4">
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
                        <div class="card-body">
                            <p class="question">
                                Answer the questions below<br>
                                <i>Choose NO MORE THAN THREE WORDS from the passage for each answer</i>
                            </p>
                            
                            <p><b>34)</b> Which substance does microalgae contain a very large amount of relative to other plants?<?= soal_isian_ielts("jawaban_reading[33]");?></p>

                            <p><b>35)</b> How can microalgae be used in farming?<?= soal_isian_ielts("jawaban_reading[34]")?></p>

                            <p><b>36)</b> Which method of microalgae harvesting uses the most energy?<?= soal_isian_ielts("jawaban_reading[35]")?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $text = "
            <p class='question'>
                Questions 34-40<br>
                <i>Read the passage and answer questions 34-40</i>
            </p>
            
            <h6><center>MICROALGAE</center></h6>
            
            <p class='reading-49'>Microalgae has been touted for the last few decades as a panacea for the world’s energy crisis, specifically our dependency on oil. At first, there was good reason to be optimistic. Compared to other biofuels, microalgae promises to be highly efficient based on its yield, as defined by the biomass in a given unit of surface area (5 to 10 grams of biomass per meter squared of surface area is typical.) Additionally, microalgae is relatively easy to produce because it can be harvested in a natural environment similar to the one in which it grows (microalgae can flourish in ponds one feet deep). The oil content in microalgae is also extremely high compared to other crops. Studies indicate that approximately 15,000 square miles, or roughly half the size of Maine, is required to sustain all the microalgae needed for the U.S. energy needs for an entire year. Nevertheless, microalgae has yet to become a viable commercial alternative to fossil fuels mainly because of the costs of providing for even a small biomass. Regardless of the method used, problems include the difficulty of ensuring that the same species thrives in a given culture (other species can form a colour gradient leading to a difficulty in photosynthesis and a reduction in output) and the relatively low yield of algal oil when used as a biofuel.</p>

            <p class='reading-50'>Microalgae has been used successfully to deal with other environment-related issues. As one example, microalgae can be grown in ponds where it can collect runoff fertiliser; this “fertiliser-enhanced” microalgae can then be used as fertiliser, thereby leading to a reduction in overall crop-production costs. Other uses of microalgae relate to eco-efficiency, meaning that it helps reduce the negative environmental impact that inevitably results from certain industrial processes. For example, microalgae can be used in water-treatment facilities to limit the amount of chemicals needed. More significantly, microalgae is able to absorb the CO2 emissions from coal factories, one of the world’s most commonly used fossil fuels, and one that is most damaging to the environment. Again, convenience explains much of microalgae’s appeal; in this case, a microalgae farm needs to be placed in close proximity to coal-producing plant to absorb much of the CO2 emissions.</p>

            <p class='reading-51'>Because of such multifaceted uses, microalgae have continued to be part of the conversation around biofuel production over the last several decades, despite the lack of any innovations in microalgae production that might lead to a viable commercial product.  The best-established methods of traditional microalgeal oil harvesting, centrifugation, filtration, and flocculation, all have issues with cost and efficiency. Centrifugation requires the rapid rotation of water containing microalgae, via a spinning motor which consumes energy at a high rate. Filtration is not-so energy intensive, but only larger species of microalgae can be caught in filters for the purposes of oil separation. Flocculation, the adding of chemicals in the algae to separate them from both water and oil through a sedimentation process in which the microalgae sinks to the bottom of the water, poses a different problem: the chemicals, once added, make the energy yield of the oil much lower, and flocculation agents are very hard to remove after the fact.  While it might be easy to be skeptical of any new innovations and discount microalgae as a perennial allurement, a number of recent breakthroughs are showing a far more promising path to full-scale viability.</p>

            <p class='reading-52'>Perhaps the most promising method of utilising microalgae’s biofuel potential is “floatation harvesting,” in large part because of its low energy cost and ease of maintenance. Other methods require frequent harvesting and are known to researchers as being “extensive and expensive”. Floatation, by contrast, involves the creation and injection of microscopic gas bubbles that stick to destabilised molecules in the microalgae, “pulling” these molecules to the surface to form a concentrate. The efficiency of floatation is also aided by the effect of gravity, which pulls water from the concentrate. In this sense, floatation is an inversion of sedimentation; floatation is preferable in that it works in conjunction with nature, since microalgae tends to float rather than settle, thereby requiring far less oversight yet leading to a thicker microalgeal concentrate.</p>

            <p class='reading-53'>Given the history of converting microalgae into a biofuel, researchers are reluctant to hail floatation as the “magic bullet” that has long eluded scientists. In addition to the problems outlined above, researchers cite several other issues, including the reduction of efficacy when diverse species of microalgae are present and the need for coagulants to neutralise the surface charge of microalgae to make it hydrophobic, so as to prevent toxicity of the biomass.</p>
        ";
    ?>

    <div class="card shadow mb-3">
        <div class="card-body ps-4">
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
                        <div class="card-body">
                            <p class="question">
                                Questions 37 - 40<br>
                                <i>Choose NO MORE THAN ONE WORD from the passage for each answer.</i>
                            </p>

                            <img src="<?= base_url()?>public/assets/img-soal/gambar_37_40.png" alt="" class="img-fluid mb-3">
                            
                            <p><b>37)</b> <?= soal_isian_ielts("jawaban_reading[36]");?></p>
                            <p><b>38)</b> <?= soal_isian_ielts("jawaban_reading[37]");?></p>
                            <p><b>39)</b> <?= soal_isian_ielts("jawaban_reading[38]");?></p>
                            <p><b>40)</b> <?= soal_isian_ielts("jawaban_reading[39]");?></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection()?>

<?= $this->section('sesi-writing')?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="question mb-3">
                        Writing Task 1
                    </p>
        
                    <table class="tableSoal">
                        <tr>
                            <td>
                                <p>
                                    <b>The chart below shows the unemployment rate and the number of people leaving Ireland from 1988 to 2008.</b>
                                </p>
                            </td>
        
                        </tr>
                    </table>
        
                    <div class="">
                        <center>
                            <img src="<?= base_url()?>public/assets/img-soal/writing-002.jpeg" alt="" class="img-fluid">
                        </center>
                    </div>
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
                        Writing Task 2
                    </p>
        
                    <table class="table">
                        <tr>
                            <td class="text-wrap">
                                <p>
                                    <b>Some people think that older school children should learn a wide range of subjects and develop knowledge. Others think that they should only study a small number of subjects in details. </b>
                                </p>
                                <p>
                                    <b>Discuss both views and give your opinion.</b>
                                </p>
                            </td>
                        </tr>
                    </table>
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