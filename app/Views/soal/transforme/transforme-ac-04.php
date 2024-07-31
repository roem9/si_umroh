<?= $this->extend('pages/soal/layout/soal_layout') ?>

<?= $this->section('sesi-listening') ?>
    <div class="card mb-3">
        <div class="card-body">
            <center>
                <audio id="audio-1" class="audio" data-id="1"><source src="<?= base_url('public/assets/myaudio/transforme/ac-04/ac-04.mp3?t='.time())?>" type="audio/mpeg"></audio>
                <progress id="seekbar-1" value="0" max="1" style="width:100%;"></progress><br>
                <button class="btn btn-success btnAudio" data-id="1" type="button">play</button>
                <p><small class="text-danger"><i>note : The audio can only be played once</i></small></p>
            </center>
        </div>
    </div>

    <!-- 1 -  10 -->
    <div class="card mb-3 soal">
        <?php $i = 0?>
        <div class="card-body">
            <center><b>IELTS LISTENING</b></center>
            <p class="question">SECTION 1</p>
            <p>
                    Questions 1-10 <br>
                    <i>Complete the form below.</i> <br>
                    <i>Write <b>NO MORE THAN THREE WORDS AND/OR A NUMBER</b> for each answer.</i><br>
            </p>
            <table>

            </table>
            <center>
                <table class="tableSoal w-70 mb-3">
                    <tr>
                        <td><center><b>HOST FAMILY APPLICATION</b></center></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Example &emsp;&emsp;&emsp;&emsp; Answer</p>
                            <p><b>Name:</b> &emsp;&emsp;&emsp;&emsp; <b><u>Jenny Chan</u></b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>Present address</b>: Sea View Guest House, <b>1)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.</p>
                            <p><b>Daytime phone number</b>: 2237676</p>
                            <p>&emsp;&emsp;[NB Best lime to contact is <b>2)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>. ]</p>
                            <p><b>Age</b>: 19</p>
                            <p><b>Intended length of stay</b>: <b>3)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.</p>
                            <p><b>Occupation while in UK</b>: student</p>
                            <p><b>General level of English</b>: <b>4)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
                            <p><b>Preferred location</b>: in the <b>5)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
                            <p><b>Special diet</b>: <b>6)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
                            <p><b>Other requirements</b>:&emsp;&emsp;own facilities</p>
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;own television</p>
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>7)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.</p>
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;to be <b>8)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
                            <p><b>Maximum price</b>: <b>9)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>£ a week</p>
                            <p><b>Preferred starting date</b>: <b>10)</b><?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <!-- 11 - 20 -->
    <?php $i = 10?>
    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                SECTION 2  Questions 11-20<br>
            </p>
            <p>
                <b>Questions 11-13</b><br>
                <i>Complete the sentences below.</i><br>
                <i>Write <b>NO MORE THAN TWO WORDS</b> for each answer.</i>
            </p>
            <p><b>11)</b> The next meeting of the soccer club will be in the <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?> in King's Park on 2 July.</p>
            <p><b>12)</b> The first event is a <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.</p>
            <p><b>13)</b> At the final dinner, players receive <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">Questions 14-17</p>
            <p>
                <i>Complete the table below.</i><br>
                <i>Write <b>NO MORE THAN THREE WORDS AND/OR A NUMBER</b> for each answer.</i>
            </p>
            <center>
                <table class="tableSoal w-70 mb-3">
                    <tr>
                        <td><b>Competition</b></td>
                        <td><b>Number of Team</b></td>
                        <td><b>Games Begin</b></td>
                        <td><b>Training Session (in King's Park)</b></td>
                    </tr>
                    <tr>
                        <td>Junior</td>
                        <td><b>14)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></td>
                        <td>8.30 am</td>
                        <td><b>15)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></td>
                    </tr>
                    <tr>
                        <td>Senior</td>
                        <td><b>16)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></td>
                        <td>2.00 pm</td>
                        <td><b>17)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">Questions 18-20</p>
            <p>
                <i>Complete the table below.</i><br>
                <i>Write <b>NO MORE THAN THREE WORDS</b> for each answer.</i>
            </p>
            <center>
                <table class="tableSoal w-70 mb-3">
                    <tr>
                        <td><b>Name of Office Bearer</b></td>
                        <td><b>Responsibility</b></td>
                    </tr>
                    <tr>
                        <td>Robert Young: President</td>
                        <td>to manage meetings</td>
                    </tr>
                    <tr>
                        <td>Gina Costello: Treasurer</td>
                        <td>to <b>18)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></td>
                    </tr>
                    <tr>
                        <td>David West: Secretary</td>
                        <td>to <b>19)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></td>
                    </tr>
                    <tr>
                        <td>Jason Dokic: Head Coach</td>
                        <td>to <b>20)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">Questions 21-24</p>
            <p>
                <i>Complete the notes below.</i><br>
                <i>Write <b>NO MORE THAN THREE WORDS</b> for each answer.</i>
            </p>
            <center>
                <table class="tableSoal w-70 mb-3">
                    <tr>
                        <td colspan=2><center><b><u>Box Telecom</u></b></center></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Problem: been affected by &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&bull;drop in <b>21)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &bull;growing <b>22)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &bull;delays due to a strike</p>
                            <p>Causes of problems: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&bull;high <b>23)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&bull;lack of good <b>24)</b> <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Questions 25-27
            </p>
            <p>
                <i>Choose the correct letter <b>A</b>, <b>B</b> or <b>C</b></i>
            </p>

            <?php
                $data_soal_25_27 = [
                    [ 
                        "no" => 25, 
                        "soal" => "What does Karin think the company will do?",
                        "pilihan" => [
                            "<b>A.</b> look for private investors",
                            "<b>B.</b> accept a takeover offer",
                            "<b>C.</b> issue some new shares"
                        ],
                        "name" => "jawaban_listening[24]"
                    ],
                    [ 
                        "no" => 26, 
                        "soal" => "How does the tutor suggest the company can recover?",
                        "pilihan" => [
                            "<b>A.</b> by appointing a new managing director",
                            "<b>B.</b> by changing the way it is organized",
                            "<b>C.</b> by closing some of its retail outlets"
                        ],
                        "name" => "jawaban_listening[25]"
                    ],
                    [ 
                        "no" => 27, 
                        "soal" => "The tutor wants Jason and Karin to produce a report which",
                        "pilihan" => [
                            "<b>A.</b> offers solutions to Box Telecom's problems.",
                            "<b>B.</b> analyses the UK market.",
                            "<b>C.</b> compares different companies."
                        ],
                        "name" => "jawaban_listening[26]"
                    ],
                ];
            ?>

            <?php foreach ($data_soal_25_27 as $data_soal) :?>
                <?= soal_pg_ielts($data_soal)?>
            <?php endforeach;?>
        </div>
    </div>

    <?php $i = 27?>
    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Questions 28-30<br>
            </p>
            <p>
                <i>Which opinion does each person express about Box Telecom?</i><br>
                <i>Choose your answers from the box and write the letters <b>A-F</b> next to questions 28-30.</i>
            </p>
            
            <table class="tableSoal w-70 mb-3">
                <tr>
                    <td>
                        <p class="ps-4"><b>A.</b> its workers are motivated</p>
                        <p class="ps-4"><b>B.</b> it has too little investment</p>
                        <p class="ps-4"><b>C.</b> it will overcome its problems</p>
                        <p class="ps-4"><b>D.</b> its marketing campaign needs improvement</p>
                        <p class="ps-4"><b>E.</b> it is old-fashioned</p>
                        <p class="ps-4"><b>F.</b> it has strong managers</p>
                    </td>
                </tr>
            </table>

            <p><b>28)</b> Karin <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
            <p><b>29)</b> Jason <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
            <p><b>30)</b> The tutor <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?></p>
        </div>
    </div>

    <?php $i = 30?>
    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                SECTION 4 Questions 31-40
            </p>
            <p class="question">
                Questions 31-36<br>
            </p>
            <p>
                <i>Choose the correct letter <b>A</b>, <b>B</b> or <b>C</b></i>
            </p>

            <?php
                $data_soal_31_36 = [
                    [ 
                        "no" => 31, 
                        "soal" => "During the first week of term, students are invited to",
                        "pilihan" => [
                            "<b>A.</b> be shown round the library by the librarian.",
                            "<b>B.</b> listen to descriptions of library resources.",
                            "<b>C.</b> do an intensive course in the computer centre."
                        ],
                        "name" => "jawaban_listening[30]"
                    ],
                    [ 
                        "no" => 32, 
                        "soal" => "The speaker warns the students that",
                        "pilihan" => [
                            "<b>A.</b> Internet materials can be unreliable.",
                            "<b>B.</b> downloaded information must be acknowledged.",
                            "<b>C.</b> computer access may be limited at times."
                        ],
                        "name" => "jawaban_listening[31]"
                    ],
                    [ 
                        "no" => 33, 
                        "soal" => "The library is acquiring more CDs as a resource because",
                        "pilihan" => [
                            "<b>A.</b> they are a cheap source of information.",
                            "<b>B.</b> they take up very little space.,",
                            "<b>C.</b> they are more up to date than the reference books."
                        ],
                        "name" => "jawaban_listening[32]"
                    ],
                    [ 
                        "no" => 34, 
                        "soal" => "Students are encouraged to use journals online because",
                        "pilihan" => [
                            "<b>A.</b> the articles do not need to be returned to the shelves.",
                            "<b>B.</b> reading online is cheaper than photocopying articles.",
                            "<b>C.</b> the stock of printed articles is to be reduced."
                        ],
                        "name" => "jawaban_listening[33]"
                    ],
                    [ 
                        "no" => 35, 
                        "soal" => "Why might some students continue to use reference books?",
                        "pilihan" => [
                            "<b>A.</b> they can be taken away from the library",
                            "<b>B.</b> they provide information unavailable elsewhere",
                            "<b>C.</b> they can be borrowed for an extended loan period"
                        ],
                        "name" => "jawaban_listening[34]"
                    ],
                    [ 
                        "no" => 36, 
                        "soal" => "What is the responsibility of the Training Supervisor?",
                        "pilihan" => [
                            "<b>A.</b> to supervise and support library staff",
                            "<b>B.</b> to provide orientation to the library facilities",
                            "<b>C.</b> to identify needs and inform section managers"
                        ],
                        "name" => "jawaban_listening[35]"
                    ]
                ];
            ?>

            <?php foreach ($data_soal_31_36 as $data_soal) :?>
                <?= soal_pg_ielts($data_soal)?>
            <?php endforeach;?>
        </div>
    </div>

    <?php $i = 36?>
    <div class="card mb-3">
        <div class="card-body">
            <p class="question">
                Questions 37-40<br>
            </p>
            <p>
                <i>Which section of the university will help postgraduate students with their dissertations in the following ways?</i>
            </p>
            
            <p class="ps-4"><b>A.</b> the postgraduate's own department or tutor</p>
            <p class="ps-4"><b>B.</b> library staff</p>
            <p class="ps-4"><b>C.</b> another section of the university</p>

            <p><i>Write the correct letter, <b>A</b>, <b>B</b> or <b>C</b>, next to questions <b>37-40</b>.</i></p>

            <p><b>37)</b> training in specialised computer programs <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.</p>
            <p><b>38)</b> advising on bibliography presentation <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.</p>
            <p><b>39)</b> checking the draft of the dissertation <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.</p>
            <p><b>40)</b> providing language support <?= soal_isian_ielts("jawaban_listening[".$i."]"); $i++?>.</p>
        </div>
    </div>

<?= $this->endSection()?>

<?= $this->section('sesi-reading') ?>
    <?php
        $text_1 = "
            <p><center><b>List of Headings</b></center></p>
            <p class='reading-1'>((b))i((/b)) The expansion of international tourism in recent years</p>
            <p class='reading-2'>((b))ii((/b)) How local communities can balance their own needs with the demands of wilderness tourism</p>
            <p class='reading-3'>((b))iii((/b)) Fragile regions and the reasons for the expansion of tourism there</p>
            <p class='reading-4'>((b))iv((/b)) Traditional methods of food-supply in fragile regions</p>
            <p class='reading-5'>((b))v((/b)) Some of the disruptive effects of wilderness tourism</p>
            <p class='reading-6'>((b))vi((/b)) The economic benefits of mass tourism</p>
        ";

        $text_2 = "
            <p><center><b>The Impact of Wilderness Tourism</b></center></p>
            <p class='reading-7'>
                ((b))A.((/b))((br))
                The market for tourism in remote areas is booming as never before. Countries all across the world are actively promoting their ‘wilderness’ regions - such as mountains, Arctic lands, deserts, small islands and wetlands - to high-spending tourists. The attraction of these areas is obvious: by definition, wilderness tourism requires little or no initial investment. But that does not mean that there is no cost. As the 1992 United Nations Conference on Environment and Development recognized, these regions are fragile (i.e. highly vulnerable to abnormal pressures) not just in terms of their ecology, but also in terms of the culture of their inhabitants. The three most significant types of fragile environment in these respects, and also in terms of the proportion of the Earth's surface they cover, are deserts, mountains and Arctic areas. An important characteristic is their marked seasonality, with harsh conditions prevailing for many months each year. Consequently, most human activities, including tourism, are limited to quite clearly defined parts of the year.((br1))((br2))
                Tourists are drawn to these regions by their natural landscape beauty and the unique cultures of their indigenous people. And poor governments in these isolated areas have welcomed the new breed of ‘adventure tourist’, grateful for the hard currency they bring. For several years now, tourism has been the prime source of foreign exchange in Nepal and Bhutan. Tourism is also a key element in the economies of Arctic zones such as Lapland and Alaska and in desert areas such as Ayers Rock in Australia and Arizona's Monument Valley.
            </p>
            <p class='reading-8'>
                ((b))B.((/b))((br))
                Once a location is established as a main tourist destination, the effects on the local community are profound. When hill-farmers, for example, can make more money in a few weeks working as porters for foreign trekkers than they can in a year working in their fields, it is not surprising that many of them give up their farm-work, which is thus left to other members of the family. In some hill-regions, this has led to a serious decline in farm output and a change in the local diet, because there is insufficient labour to maintain terraces and irrigation systems and tend to crops. The result has been that many people in these regions have turned to outside supplies of rice and other foods.((br1))((br2))
                In Arctic and desert societies, year-round survival has traditionally depended on hunting animals and fish and collecting fruit over a relatively short season. However, as some inhabitants become involved in tourism, they no longer have time to collect wild food; this has led to increasing dependence on bought food and stores. Tourism is not always the culprit behind such changes. All kinds of wage labour, or government handouts, tend to undermine traditional survival systems. Whatever the cause, the dilemma is always the same: what happens if these new, external sources of income dry up?((br3))((br4))
                The physical impact of visitors is another serious problem associated with the growth in adventure tourism. Much attention has focused on erosion along major trails, but perhaps more important are the deforestation and impacts on water supplies arising from the need to provide tourists with cooked food and hot showers. In both mountains and deserts, slow-growing trees are often the main sources of fuel and water supplies may be limited or vulnerable to degradation through heavy use.
            </p>
            <p class='reading-9'>
                ((b))C.((/b))((br))
                Stories about the problems of tourism have become legion in the last few years. Yet it does not have to be a problem. Although tourism inevitably affects the region in which it takes place, the costs to these fragile environments and their local cultures can be minimized. Indeed, it can even be a vehicle for reinvigorating local cultures, as has happened with the Sherpas of Nepal's Khumbu Valley and in some Alpine villages. And a growing number of adventure tourism operators are trying to ensure that their activities benefit the local population and environment over the long term.((br1))((br2))
                In the Swiss Alps, communities have decided that their future depends on integrating tourism more effectively with the local economy. Local concern about the rising number of second home developments in the Swiss Pays d'Enhaut resulted in limits being imposed on their growth. There has also been a renaissance in communal cheese production in the area, providing the locals with a reliable source of income that does not depend on outside visitors.((br4))((br3))
                Many of the Arctic tourist destinations have been exploited by outside companies, who employ transient workers and repatriate most of the profits to their home base. But some Arctic communities are now operating tour businesses themselves, thereby ensuring that the benefits accrue locally. For instance, a native corporation in Alaska, employing local people, is running an air tour from Anchorage to Kotzebue, where tourists eat Arctic food, walk on the tundra and watch local musicians and dancers.((br5))((br6))
                Native people in the desert regions of the American Southwest have followed similar strategies, encouraging tourists to visit their pueblos and reservations to purchase high-quality handicrafts and artwork. The Acoma and San Ildefonso pueblos have established highly profitable pottery businesses, while the Navajo and Hopi groups have been similarly successful with jewellery.((br7))((br8))
                Too many people living in fragile environments have lost control over their economies, their culture and their environment when tourism has penetrated their homelands. Merely restricting tourism cannot be the solution to the imbalance, because people's desire to see new places will not just disappear. Instead, communities in fragile environments must achieve greater control over tourism ventures in their regions; in order to balance their needs and aspirations with the demands of tourism. A growing number of communities are demonstrating that, with firm communal decision-making, this is possible. The critical question now is whether this can become the norm, rather than the exception.

            </p>
        ";

        $text_3 = "
            <p><center><b>Flawed Beauty: the problem with toughened glass</b></center></p>
            <p class='reading-10'>
                On 2nd August 1999, a particularly hot day in the town of Cirencester in the UK, a large pane of toughened glass in the roof of a shopping centre at Bishops Walk shattered without warning and fell from its frame. When fragments were analysed by experts at the giant glass manufacturer Pilkington, which had made the pane, they found that minute crystals of nickel sulphide trapped inside the glass had almost certainly caused the failure.
            </p>
            <p class='reading-11'>
                ‘The glass industry is aware of the issue,’ says Brian Waldron, chairman of the standards committee at the Glass and Glazing Federation, a British trade association, and standards development officer at Pilkington. But he insists that cases are few and far between. ‘It's a very rare phenomenon,’ he says.
            </p>
            <p class='reading-12'>
                Others disagree. ‘On average I see about one or two buildings a month suffering from nickel sulphide related failures,’ says Barrie Josie, a consultant engineer involved in the Bishops Walk investigation. Other experts tell of similar experiences. Tony Wilmott of London-based consulting engineers Sandberg, and Simon Armstrong at CIadTech Associates in Hampshire both say they know of hundreds of cases. ‘What you hear is only the tip of the iceberg,’ says Trevor Ford, a glass expert at Resolve Engineering in Brisbane, Queensland. He believes the reason is simple: ‘No-one wants bad press.’
            </p>
            <p class='reading-13'>
                Toughened glass is found everywhere, from cars and bus shelters to the windows, walls and roofs of thousands of buildings around the world. It's easy to see why. This glass has five times the strength of standard glass, and when it does break it shatters into tiny cubes rather than large, razor-sharp shards. Architects love it because large panels can be bolted together to make transparent walls, and turning it into ceilings and floors is almost as easy.
            </p>
            <p class='reading-14'>
                It is made by heating a sheet of ordinary glass to about 620°C to soften it slightly, allowing its structure to expand, and then cooling it rapidly with jets of cold air. This causes the outer layer of the pane to contract and solidify before the interior. When the interior finally solidifies and shrinks, it exerts a pull on the outer layer that leaves it in permanent compression and produces a tensile force inside the glass. As cracks propagate best in materials under tension, the compressive force on the surface must be overcome before the pane will break, making it more resistant to cracking.
            </p>
            <p class='reading-15'>
                The problem starts when glass contains nickel sulphide impurities. Trace amounts of nickel and sulphur are usually present in the raw materials used to make glass, and nickel can also be introduced by fragments of nickel alloys falling into the molten glass. As the glass is heated, these atoms react to form tiny crystals of nickel sulphide. Just a tenth of a gram of nickel in the furnace can create up to 50,000 crystals.
            </p>
            <p class='reading-16'>
                These crystals can exist in two forms: a dense form called the alpha phase, which is stable at high temperatures, and a less dense form called the beta phase, which is stable at room temperatures. The high temperatures used in the toughening process convert all the crystals to the dense, compact alpha form. But the subsequent cooling is so rapid that the crystals don't have time to change back to the beta phase. This leaves unstable alpha crystals in the glass, primed like a coiled spring, ready to revert to the beta phase without warning.
            </p>
            <p class='reading-17'>
                When this happens, the crystals expand by up to 4%. And if they are within the central, tensile region of the pane, the stresses this unleashes can shatter the whole sheet. The time that elapses before failure occurs is unpredictable. It could happen just months after manufacture, or decades later, although if the glass is heated - by sunlight, for example - the process is speeded up. Ironically, says Graham Dodd, of consulting engineers Arup in London, the oldest pane of toughened glass known to have failed due to nickel sulphide inclusions was in Pilkington's glass research building in Lathom, Lancashire. The pane was 27 years old.
            </p>
            <p class='reading-18'>
                Data showing the scale of the nickel sulphide problem is almost impossible to find. The picture is made more complicated by the fact that these crystals occur in batches. So even if, on average, there is only one inclusion in 7 tonnes of glass, if you experience one nickel sulphide failure in your building, that probably means you've got a problem in more than one pane. Josie says that in the last decade he has worked on over 15 buildings with the number of failures into double figures.
            </p>
            <p class='reading-19'>
                One of the worst examples of this is Waterfront Place, which was completed in 1990. Over the following decade the 40 storey Brisbane block suffered a rash of failures. Eighty panes of its toughened glass shattered due to inclusions before experts were finally called in. John Barry, an expert in nickel sulphide contamination at the University of Queensland, analysed every glass pane in the building. Using a studio camera, a photographer went up in a cradle to take photos of every pane. These were scanned under a modified microfiche reader for signs of nickel sulphide crystals. ‘We discovered at least another 120 panes with potentially dangerous inclusions which were then replaced,’ says Barry. ‘It was a very expensive and time-consuming process that took around six months to complete.’ Though the project cost A$1.6 million (nearly £700,000), the alternative - re-cladding the entire building - would have cost ten times as much.
            </p>
        ";

        $text_4 = "
            <p><center><b>The effects of light on plant and animal species</b></center></p>
            <p class='reading-20'>
                Light is important to organisms for two different reasons. Firstly, it is used as a cue for the timing of daily and seasonal rhythms in both plane and animals, and secondly it is used to assist growth in plants.
            </p>
            <p class='reading-21'>
                Breeding in most organisms occurs during a part of the year only, and so a reliable cue is needed to trigger breeding behaviour. Day length is an excellent cue, because it provides a perfectly predictable pattern of change within the year. In the temperate zone in spring, temperatures fluctuate greatly from day to day, but day length increases steadily by a predictable amount. The seasonal impact of day length on physiological responses is called photoperiodism, and the amount of experimental evidence for this phenomenon is considerable. For example, some species of birds' breeding can be induced even in midwinter simply by increasing day length artificially (Wolfson 1964). Other examples of photoperiodism occur in plants. A short-day plant flowers when the day is less than a certain critical length. A long-day plant flowers after a certain critical day length is exceeded. In both cases the critical day length differs from species to species. Plane which flower after a period of vegetative growth, regardless of photoperiod, are known as day-neutral plants.
            </p>
            <p class='reading-22'>
                Breeding seasons in animals such as birds have evolved to occupy the part of the year in which offspring have the greatest chances of survival. Before the breeding season begins, food reserves must be built up to support the energy cost of reproduction, and to provide for young birds both when they are in the nest and after fledging. Thus many temperate-zone birds use the increasing day lengths in spring as a cue to begin the nesting cycle, because this is a point when adequate food resources will be assured.
            </p>
            <p class='reading-23'>
                The adaptive significance of photoperiodism in plane is also clear. Short-day plane that flower in spring in the temperate zone are adapted to maximising seedling growth during the growing season. Long-day plants are adapted for situations that require fertilization by insects, or a long period of seed ripening. Short-day plane that flower in the autumn in the temperate zone are able to build up food reserves over the growing season and over winter as seeds. Day-neutral plane have an evolutionary advantage when the connection between the favourable period for reproduction and day length is much less certain. For example, desert annuals germinate, flower and seed whenever suitable rainfall occurs, regardless of the day length.
            </p>
            <p class='reading-24'>
                The breeding season of some plants can be delayed to extraordinary lengths. Bamboos are perennial grasses that remain in a vegetative state for many years and then suddenly flower, fruit and die (Evans 1976). Every bamboo of the species Chusquea abietifolio on the island of Jamaica flowered, set seed and died during 1884. The next generation of bamboo flowered and died between 1916 and 1918, which suggests a vegetative cycle of about 31 years. The climatic trigger for this flowering cycle is not-yet known, but the adaptive significance is clear. The simultaneous production of masses of bamboo seeds (in some cases lying 12 to 15 centimetres deep on the ground) is more than all the seed-eating animals can cope with at the time, so that some seeds escape being eaten and grow up to form the next generation (Evans 1976).
            </p>
            <p class='reading-25'>
                The second reason light is important to organisms is that it is essential for photosynthesis. This is the process by which plants use energy from the sun to convert carbon from soil or water into organic material for growth. The rate of photosynthesis in a plant can be measured by calculating the rate of its uptake of carbon. There is a wide range of photosynthetic responses of plants to variations in light intensity. Some plants reach maximal photosynthesis at one-quarter full sunlight, and others, like sugarcane, never reach a maximum, but continue to increase photosynthesis rate as light intensity rises.
            </p>
            <p class='reading-26'>
                Plants in general can be divided into two groups: shade-tolerant species and shade-intolerant species. This classification is commonly used in forestry and horticulture. Shade-tolerant plane have lower photosynthetic rates and hence have lower growth rates than those of shade-intolerant species. Plant species become adapted to living in a certain kind of habitat, and in the process evolve a series of characteristics that prevent them from occupying other habitats. Grime (1966) suggests that light may be one of the major components directing these adaptations. For example, eastern hemlock seedlings are shade-tolerant. They can survive in the forest understorey under very low light levels because they have a low photosynthetic rate.
            </p>
        ";
    ?>

    <!-- 1 - 3 -->
    <?php $i = 0?>
    <div class="card shadow mb-3">
        <div class="card-body">
            <p><b>READING PASSAGE 1</b></p>
            <p>
                <i>You should spend about 20 minutes on <b>Questions 1–13</b> which are based on Reading Passage 1 on the following pages.</i>
            </p>
            
            <p>
                <b>Questions 1-3</b><br>
                Reading Passage 1 has three paragraphs, <b>A-C</b>.<br>
                <i>Choose the correct heading for each section from the list of headings below.</i><br>
                <i>
                    Write the correct number <b>i-vi</b> in boxes 1-3 on your answer sheet.
                </i>
            </p>
            
            <table class="tableSoal w-75 mb-3">
                <tr>
                    <td>
                        <?= $text_1?>
                    </td>
                </tr>
            </table>

            <p><b>1)</b> Section A <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
            <p><b>2)</b> Section B <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
            <p><b>3)</b> Section C <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
        </div>
    </div>

    <?php $i = 3?>
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
                                <b>Questions 4-9</b> <br><br>
                            </p>
                            <p>
                                Do the following statements agree with the information given in Reading Passage 1?<br>
                                <i>In boxes 4-9 on your answer sheet write</i>
                            </p>
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td>
                                        <b>TRUE</b> if the statement reflects the opinion of the writer<br>
                                        <b>FALSE</b> if the statement contradicts the opinion of the writer<br>
                                        <b>NOT GIVEN</b> if it is impossible to say what the writer thinks about this<br>
                                    </td>
                                </tr>
                            </table>
                            
                            <p><b>4.</b> The low financial cost of setting up wilderness tourism makes it attractive to many countries.  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>5.</b> Deserts, mountains and Arctic regions are examples of environments that are both ecologically and culturally fragile.  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>6.</b> Wilderness tourism operates throughout the year in fragile areas.  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>7.</b> The spread of tourism in certain hill-regions has resulted in a fall in the amount of food produced locally.  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>8.</b> Traditional food-gathering in desert societies was distributed evenly over the year.  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>9.</b> Government handouts do more damage than tourism does to traditional patterns of food-gathering.  <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>

                            <p class="question mt-3">
                                <b>Questions 10-13</b> <br><br>
                            </p>
                            <p>
                                <i>
                                Choose <b>ONE WORD</b> from Reading Passage 1 for each answer.<br>
                                Write your answers in boxes 10-13 on your answer sheet.</i>
                            </p>
                            <table class="tableSoal w-100 mb-3">
                                <tr>
                                    <td colspan=2><b>The positive ways in which some local communities have responded to tourism</b></td>
                                </tr>
                                <tr>
                                    <td><b>People/Location</b></td>
                                    <td><b>Activity</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        Swiss Pays d'Enhaut
                                    </td>
                                    <td>
                                        Revived production of <b>10)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Arctic communities
                                    </td>
                                    <td>
                                        Operate <b>11)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> businesses<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Acoma and San Ildefonso<br>
                                    </td>
                                    <td>
                                        Produce and sell <b>(12)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Navajo and Hopi Activity
                                    </td>
                                    <td>
                                        Produce and sell <b>(13)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?><br>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i = 13?>
    <!-- 15 - 20 -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="question">
                <b>READING PASSAGE 2</b> <br><br>
            </p>
            <p>
                <i>You should spend about 20 minutes on <b>Questions 14-26</b> which are based on Reading Passage 2 below.</i>
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
                                <b>Questions 14-17</b> <br><br>
                            </p>
                            <p>
                                <i>
                                    Look at the following people and the list of statements below.<br>
                                    Match each person with the correct statement.<br>
                                    Write the correct letter <b>A-H</b> in boxes 14-17 on your answer sheet.
                                </i>
                            </p>

                            <p><b>14.</b> Brian Waldron <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>15.</b> Trevor Ford <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>16.</b> Graham Dodd <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>
                            <p><b>17.</b> John Barry <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?></p>

                            <div class="mt-3">
                                <table class="tableSoal w-100">
                                    <tr>
                                        <td>
                                            <p><center><b>List of Statements</b></center></p>
                                            <p><b>A.</b> suggests that publicity about nickel sulphide failure has been suppressed</p>
                                            <p><b>B.</b> regularly sees cases of nickel sulphide failure</p>
                                            <p><b>C.</b> closely examined all the glass in one building</p>
                                            <p><b>D.</b> was involved with the construction of Bishops Walk</p>
                                            <p><b>E.</b> recommended the rebuilding of Waterfront Place</p>
                                            <p><b>F.</b> thinks the benefits of toughened glass are exaggerated</p>
                                            <p><b>G.</b> claims that nickel sulphide failure is very unusual</p>
                                            <p><b>H.</b> refers to the most extreme case of delayed failure</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <p class="question mt-3">
                                <b>Questions 18-23</b> <br><br>
                            </p>
                            <p>
                                <i>
                                    Complete the summary with the list of words <b>A-P</b> below.<br>
                                    Write your answers in boxes 18-23 on your answer sheet.
                                </i>
                            </p>
                            <center>
                                <p>
                                    <b>Toughened Glass</b>
                                </p>
                            </center>
                            <p>
                                Toughened glass is favoured by architects because it is much stronger than ordinary glass, and the fragments are not as <b>18)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> when it breaks. However, it has one disadvantage: it can shatter <b>19)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> This fault is a result of the manufacturing process. Ordinary glass is first heated, then cooled very <b>20)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> . The outer layer <b>21)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> before the inner layer, and the tension between the two layers which is created because of this makes the glass stronger. However, if the glass contains nickel sulphide impurities, crystals of nickel sulphide are formed. These are unstable, and can expand suddenly, particularly if the weather is <b>22)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> If this happens, the pane of glass may break. The frequency with which such problems occur is <b>23)</b> <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> by glass experts. Furthermore, the crystals cannot be detected without sophisticated equipment.
                            </p>

                            <div class="mt-3 mb-3">
                                <table class="tableSoal w-100">
                                    <tr>
                                        <td>A. numerous	</td>
                                        <td>B. detected	</td>
                                        <td>C. quickly	</td>
                                    </tr>
                                    <tr>
                                        <td>D. agreed	</td>
                                        <td>E. warm	</td>
                                        <td>F. sharp	</td>
                                    </tr>
                                    <tr>
                                        <td>G. expands	</td>
                                        <td>H. slowly	</td>
                                        <td>I. unexpectedly</td>
                                    </tr>
                                    <tr>
                                        <td>J. removed	</td>
                                        <td>K. contracts	</td>
                                        <td>L. disputed</td>
                                    </tr>
                                    <tr>
                                        <td>M. cold	</td>
                                        <td>N. moved	</td>
                                        <td>O. small	</td>
                                    </tr>
                                    <tr>
                                        <td>P. calculated</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>

                            <p class="question">
                                <b>Questions 24-26</b>
                            </p>
                            <p>
                                Do the following statements agree with the information given in Reading Passage 2?<br>
                                <i>In boxes 24-26 on your answer sheet write</i>
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
                                $data_soal_24_26 = [
                                    [
                                        "no" => 24,
                                        "soal" => "Little doubt was expressed about the reason for the Bishops Walk accident.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[23]"
                                    ],
                                    [
                                        "no" => 25,
                                        "soal" => "Toughened glass has the same appearance as ordinary glass.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[24]"
                                    ],
                                    [
                                        "no" => 26,
                                        "soal" => "There is plenty of documented evidence available about the incidence of nickel sulphide failure.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[25]"
                                    ],
                                ];
                            ?>

                            <?php foreach ($data_soal_24_26 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal);?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <?php $i = 26?>
    <!-- 27 - 40 -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <p>
                <b>READING PASSAGE 3</b>
            </p>
            <p><i>You should spend about 20 minutes on <b>Questions 27-40</b> which are based on Reading Passage 3 below.</i></p>

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
                                <b>Questions 27-33</b> <br><br>
                            </p>
                            <p>
                                Do the following statements agree with the information given in Reading Passage 3?<br>
                                <i>In boxes 27-33 on your answer sheet write</i>
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
                                $data_soal_27_33 = [
                                    [
                                        "no" => 27,
                                        "soal" => "There is plenty of scientific evidence to support photoperiodism.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[26]"
                                    ],
                                    [
                                        "no" => 28,
                                        "soal" => "Some types of bird can be encouraged to breed out of season.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[27]"
                                    ],
                                    [
                                        "no" => 29,
                                        "soal" => "Photoperiodism is restricted to certain geographic areas.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[28]"
                                    ],
                                    [
                                        "no" => 30,
                                        "soal" => "Desert annuals are examples of long-day plants.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[29]"
                                    ],
                                    [
                                        "no" => 31,
                                        "soal" => "Bamboos flower several times during their life cycle.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[30]"
                                    ],
                                    [
                                        "no" => 32,
                                        "soal" => "Scientists have yet to determine the cue for Chusquea abietifolia's seasonal rhythm.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[31]"
                                    ],
                                    [
                                        "no" => 33,
                                        "soal" => "Eastern hemlock is a fast-growing plant.",
                                        "pilihan" => ["TRUE", "FALSE", "NOT GIVEN"],
                                        "name" => "jawaban_reading[32]"
                                    ],
                                ];
                            ?>

                            <?php foreach ($data_soal_27_33 as $data_soal) :?>
                                <?= soal_pg_ielts($data_soal);?>
                            <?php endforeach;?>

                            <?php $i = 33?>
                            <p class="question mt-3">
                                <b>Questions 34-40</b> <br><br>
                            </p>
                            <p>
                                Complete the sentences. <br>
                                Choose <b>NO MORE THAN THREE WORDS</b> from the passage for each answer. <br>
                                Write your answers in boxes <b>34-40</b> on your answer sheet.
                            </p>
                            <p><b>34)</b> Day length is a useful cue for breeding in areas where <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> are unpredictable.</p>
                            <p><b>35)</b> Plants which do not respond to light levels are referred to as <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>.</p>
                            <p><b>36)</b> Birds in temperate climates associate longer days with nesting and the availability of <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>.</p>
                            <p><b>37)</b> Plants that Bower when days are long often depend on <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>to help them reproduce.</p>
                            <p><b>38)</b> Desert annuals respond to <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> as a signal for reproduction.</p>
                            <p><b>39)</b> There is no limit to the photosynthetic rate in plants such as <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?>.</p>
                            <p><b>40)</b> Tolerance to shade is one criterion for the <?= soal_isian_ielts("jawaban_reading[".$i."]"); $i++?> of plants in forestry and horticulture.</p>
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
                        <p><b>The take below gives information about the underground railway systems in six cities.</b></p>
                        <p><b>Summarise the information by selecting and reporting the main features, and make comparisons where relevant.</b></p>
                    </div>

                    <p>You should write at least 150 words.</p>
                    <p><center><b>Underground Railways Systems</b></center></p>

                    <table class="tableSoal w-100">
                        <tr>
                            <td><b>City</b></td>
                            <td><b>Date opened</b></td>
                            <td><b>Kilometres of route</b></td>
                            <td><b>Passengers per year <br>(in  millions)</b></td>
                        </tr>
                        <tr>
                            <td><b>London</b></td>
                            <td>1863</td>
                            <td>394</td>
                            <td>775</td>
                        </tr>
                        <tr>
                            <td><b>Paris</b></td>
                            <td>1900</td>
                            <td>199</td>
                            <td>1191</td>
                        </tr>
                        <tr>
                            <td><b>Tokyo</b></td>
                            <td>1927</td>
                            <td>155</td>
                            <td>1927</td>
                        </tr>
                        <tr>
                            <td><b>Washington DC</b></td>
                            <td>1976</td>
                            <td>126</td>
                            <td>144</td>
                        </tr>
                        <tr>
                            <td><b>Kyoto</b></td>
                            <td>1981</td>
                            <td>11</td>
                            <td>45</td>
                        </tr>
                        <tr>
                            <td><b>Los Angeles</b></td>
                            <td>2001</td>
                            <td>28</td>
                            <td>50</td>
                        </tr>
                    </table>
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
                        <p><b>Research indicates that the characteristics we are born with have much more influence on our personality and development than any experiences we may have in our life.</b></p>
                        <p><b>Which do you consider to be the major influence?</b></p>
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