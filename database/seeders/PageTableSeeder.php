<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
         DB::table('pages')->delete();

         DB::table('pages')->insert(array(
            0 =>
            array('id' => '1', 'title' => 'Условия и положения', 'slug' => 'terms-conditions', 'content' => '<div class="mb-5" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;"><span style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px; background-color: var(--bs-body-bg); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);">Welcome to ThemeTags!</span><br></h2><p style="">These terms and conditions outline the rules and regulations for the use of Themetags\'s Website, located at https://themetags.com/.</p><p style="">Заходя на этот веб-сайт, мы предполагаем, что вы принимаете эти условия. Не продолжайте использовать ThemeTags, если вы не согласны принять все условия, изложенные на этой странице.</p><p class="mb-0" style="">Следующая терминология применяется к настоящим Условиям, Положению о конфиденциальности и Уведомлению об отказе от ответственности, а также ко всем Соглашениям: «Клиент», «Вы» и «Ваш» относятся к вам, лицу, зарегистрированному на этом веб-сайте и соответствующему Компании.\'s условия и положения. «Компания», «Мы сами», «Мы», «Наш» и «Нас» относятся к нашей Компании. «Сторона», «Стороны» или «Нас» относятся как к Клиенту, и мы сами. Все условия относятся к предложению, принятию и рассмотрению платежа, необходимого для осуществления процесса нашей помощи Клиенту наиболее подходящим образом для явной цели удовлетворения потребностей Клиента в отношении предоставления заявленных услуг Компании, в соответствии с действующим законодательством Нидерландов. Любое использование вышеуказанной терминологии или других слов в единственном, множественном, капитализация и/или он/она или они считаются взаимозаменяемыми и, следовательно, относятся к одному и тому же.</p></div><div class="mb-5" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;">Cookies</h2><p>Мы используем файлы cookie. Получая доступ к ThemeTags, вы соглашаетесь использовать файлы cookie в соответствии с Themetags.\'s Политика конфиденциальности.</p><p class="mb-0">Большинство интерактивных веб-сайтов используют файлы cookie, чтобы мы могли получить информацию о пользователе.\'s Подробная информация о каждом посещении. Файлы cookie используются нашим веб-сайтом, чтобы обеспечить функциональность определенных областей, чтобы сделать их более удобными для людей. посещение нашего веб-сайта. Некоторые из наших аффилированных/рекламных партнеров также могут использовать файлы cookie.</p></div><div class="mb-5" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;">License</h2><p>Если не указано иное, Themetags и/или ее лицензиары владеют правами интеллектуальной собственности на все материалы ThemeTags. Все интеллектуальное права собственности защищены. Вы можете получить доступ к этому из ThemeTags для личного использования с учетом ограничений, установленных в эти условия.</p><p>You must not:</p><ul class="mb-3"><li>Перепубликовать материал с ThemeTags</li><li>Продавайте, арендуйте или сублицензируйте материалы от ThemeTags</li><li>Reproduce, duplicate or copy material from ThemeTags</li><li>Распространять контент из ThemeTags</li></ul><p>Части этого веб-сайта предлагают пользователям возможность публиковать сообщения и обмениваться мнениями Распространять контент из ThemeTags</li></ul><p>Части этого веб-сайта предлагают пользователям возможность публиковать сообщения и обмениваться мнениями до их появления на сайте. Комментарии не отражают взгляды и мнения Themetags,его агенты и/или аффилированные лица. Комментарии отражают взгляды и мнения человека, который публикует свои взгляды и мнения. Насколько разрешено применимым законодательством, Themetags не несет ответственности за Комментарии или за любую ответственность, ущерб или расходы, причиненные и/или понесенные в результате любого использования и/или публикации и/или появления Комментариев на этом веб-сайте.</p><p>Themetags оставляет за собой право отслеживать все Комментарии и удалять любые Комментарии, которые могут быть сочтены неуместными, оскорбительными или нарушающими настоящие Условия.</p><p>Вы гарантируете и заявляете, что:</p><ul class="mb-3"><li>Вы имеете право публиковать Комментарии на нашем веб-сайте и имеете для этого все необходимые лицензии и согласия;</li><li>Комментарии не нарушают никаких прав интеллектуальной собственности, включая, помимо прочего, авторские права, патенты или товарные знаки любого третьего лица;</li><li>Комментарии не содержат клеветнических, клеветнических, оскорбительных, непристойных или иных незаконных материалов, которые являются вторжением конфиденциальности</li><li>Комментарии не будут использоваться для подстрекательства или продвижения бизнеса или обычаев, а также для демонстрации коммерческой деятельности или незаконной деятельности.</li></ul><p class="mb-0">Настоящим вы предоставляете Themetags неисключительную лицензию на использование, воспроизведение, редактирование и разрешение другим использовать, воспроизводить и редактировать любые ваши комментарии в любых формах, форматах или на любых носителях.</p></div><div class="mb-5" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;">Hyperlinking to our Content</h2><p>Следующие организации могут ссылаться на наш веб-сайт без предварительного письменного разрешения:</p><ul class="mb-3"><li>Государственные органы;</li><li>Поисковые системы;</li><li>новостные организации;</li><li>Распространители онлайн-справочников могут ссылаться на наш веб-сайт таким же образом, как они делают гиперссылки на веб-сайты других перечисленных компаний; и</li><li>Общесистемные аккредитованные предприятия, за исключением привлечения некоммерческих организаций, благотворительных торговых центров и благотворительных групп по сбору средств, которые не могут иметь гиперссылку на наш веб-сайт.</li></ul><p>Эти организации могут ссылаться на нашу домашнюю страницу, на публикации или на другую информацию веб-сайта, если ссылка: (а) никоим образом не является вводящей в заблуждение; (b) не подразумевает ложного спонсорства, одобрения или одобрения связывающей стороны и ее продуктов и/или услуг; и (c) соответствует контексту связывающей стороны\'s сайт.</p><p>Мы можем рассматривать и одобрять другие запросы на ссылки от следующих типов организаций:</p><ul class="mb-3"><li>общеизвестные источники потребительской и/или деловой информации;</li><li>dot.com community sites;</li><li>associations or other groups representing charities;</li><li>online directory distributors;</li><li>internet portals;</li><li>accounting, law and consulting firms; and</li><li>educational institutions and trade associations.</li></ul><p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Themetags; and (d) the link is in the context of general resource information.</p><p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.</p><p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Themetags. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p><p>Approved organizations may hyperlink to our Website as follows:</p><ul class="mb-3"><li>By use of our corporate name; or</li><li>By use of the uniform resource locator being linked to; or</li><li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li></ul><p>No use of Themetags\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p></div><div class="mb-5" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;">iFrames</h2><p class="mb-0">Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p></div><div class="mb-5" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;">Content Liability</h2><p class="mb-0">We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p></div><div class="mb-5" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;">Your Privacy</h2><p class="mb-0">Please read Privacy Policy</p></div><div class="mb-5" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;">Reservation of Rights</h2><p class="mb-0">We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p></div><div class="mb-5" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;">Removal of links from our website</h2><p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p><p class="mb-0">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p></div><div class="content-group" style="color: rgb(71, 85, 105); font-family: Jost, sans-serif; font-size: 15.008px;"><h2 class="h5" style="font-family: Rubik, sans-serif; font-weight: 500; color: rgb(51, 65, 85); font-size: 1.1725rem;">Disclaimer</h2><p style="">To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p><ul style=""><li>limit or exclude our or your liability for death or personal injury;</li><li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li><li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li><li>exclude any of our or your liabilities that may not be excluded under applicable law.</li></ul><p style="">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p><p class="mb-0" style="">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p></div>', 'meta_title' => 'Quis ab ut officia b', 'meta_image' => '30', 'meta_description' => 'Explicabo Consectet', 'created_at' => '2023-02-16 06:28:22', 'updated_at' => '2023-03-01 05:18:38', 'deleted_at' => NULL)
        ));
    }
}