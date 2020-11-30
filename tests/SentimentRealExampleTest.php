<?php

use PHPInsight\Sentiment;
use PHPUnit\Framework\TestCase;

class SentimentRealExampleTest extends TestCase
{
    /** @test */
    public function example_1()
    {
        $sentence = 'Wow!!First you say that I can get a  $8100 loan then you refuse my loan for $2500!!!!!Then STOP SENDING ME THESE FUCKING MESSAGES!!!!!!!!!!Sent from my Verizon, Samsung Galaxy smartphone. Original message From: "Ryan, Lending Professional" Date: 10/12/20 10:30 PM (GMT05:00) To: bsp4511@yahoo.com Subject: 📎 ATTACHMENT: Your $8,100 lending 🎁 request is here Congratulations ! Today, Oct 13, 2020, your membership has earned access to a brandnew personal lending request, available to valuable members like yourself.   📎Attached: Activate a $8,100 lending request HERE   I hope you are having a great day and please feel free to reply back with any questions.   Enjoy! This ad was sent by  info@thedailynewsrelease.com because you opted in to receive our daily newsletters. If you no longer wish to receive these emails then you can unsubscribe here.     PO Box 1577 PMB 23797 Atlanta, GA 30301.';
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['refuse', 'stop', 'fucking', 'unsubscribe'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_2()
    {
        $sentence = 'STOP!!!. Not interested!!!!. On Tue, Oct 13, 2020, 8:00 AM Liberty University Online <.';
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['stop'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_3()
    {
        $sentence = 'Stop sending this BullshitSent from my TMobile 4G LTE Device. Original message From: Trevor Date: 10/13/20 10:00 AM (GMT06:00) To: joespratt730@gmail.com Subject: 💰 Reward Yourself With the Benefit of Credit 💳 Hi ,   Pulse Platinum is a memberonly club for online shopping and you\'re invited!   You can get immediate approval with no credit check.   See how you can get a $1000 credit line.   👉 Tap to Apply HERE!   Cheers,    Trevor This is an adsupported newsletter. You are receiving this because you opted in to receive our daily newsletter. You can Unsubscribe here.   PO Box 105603 #45512Atlanta, GA 303485603.';
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['stop'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_4()
    {
        $sentence = "Unsubscribe. ♡BRITT♡. On Tue, Oct 13, 2020, 12:02 PM Check Your Credit.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['unsubscribe'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_5()
    {
        $sentence = "I am looking elsewhere. Please do not contact me again. Sent from my iPhone. > On Oct 13, 2020, at 6:22 AM, Craig S wrote:";
        $analyzer = new Sentiment();
        $analyzer->reloadDictionaries();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['notcontact'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_6()
    {
        $sentence = "STOP. On Tue, Oct 13, 2020, 12:02 PM Globe Life Partner wrote:. > .........Get $100,000 Globe Life Coverage Now From The Comfort of Your.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['stop'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_7()
    {
        $sentence = "Remove me from your emailing list. Thanks. Sent from my iPhone";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['remove', 'emailing'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_8()
    {
        $sentence = "Re: Bespoke Perks, delivered to your doorstep	Stop. On Mon, Oct 12, 2020, 3:02 PM Bespoke Post wrote:. > ........Bespoke favorites that make staying home a better time.........";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['stop'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_9()
    {
        $sentence = "Re: $180/ Month 2 Bedroom house in your neighborhood OSSINING!	You guys are scammers because I signed up and now you don’t give me any. listings stop emailing me. On Mon, Oct 12, 2020 at 12:32 PM Shaun, Rent to Own Homes <.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['stop', 'emailing'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_10()
    {
        $sentence = "Re: Get A Free Evaluation on Your Tax Debt!	Unsubscribe me. On Mon, Oct 12, 2020, 9:01 AM Federal Tax Settlement <. info@eatsleepmeme.com> wrote:.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['unsubscribe'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_11()
    {
        $sentence = "Re: Discover lower auto insurance rates with GEICO!	I told you people stop messaging me I will call the BBB message me one more. time!!!!!. On Mon, Oct 12, 2020, 2:07 PM GEICO Auto Insurance.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['stop'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_12()
    {
        $sentence = "Re: Get complete satisfaction with Carshield	I'm not interested. On Mon, Oct 12, 2020, 11:32 AM Carshield wrote:. > Images not loading? Click Here.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['notinterested'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_13()
    {
        $sentence = "Re: Get complete satisfaction with Carshield	I'm not interested. On Mon, Oct 12, 2020, 11:32 AM Carshield wrote:. > Images not loading? Click Here.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['notinterested'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_14()
    {
        $sentence = "Re: Switch your auto insurance policy and you could save	Please stop sending me emails about getting insurance policy from you I am. already a customer of yours Michelle Brown. On Sat, Oct 10, 2020, 6:45 PM GEICO Auto Insurance <.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['stop'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_15()
    {
        $sentence = "Re: Just Dropped 💧 Bathroom Remodel Prices You Have to See	Unsubscribe. On Mon, Oct 12, 2020, 1:31 PM Bathroom Professionals. wrote:.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
        $this->assertEquals(['dropped', 'unsubscribe'], $analyzer->score($sentence)['neg_words']);
    }

    /** @test */
    public function example_16()
    {
        $sentence = "Re: GEICO makes it easy to save on auto insurance	Unsubscribe. On Mon, Oct 12, 2020, 6:31 PM GEICO Auto Insurance. wrote:.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
    }

    /** @test */
    public function example_17()
    {
        $sentence = "Re: We Know How to Fix Your Credit	Fuck off. On Mon, Oct 12, 2020, 11:04 AM Lexington Law wrote:. > Images not loading? Click Here.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
    }

    /** @test */
    public function example_18()
    {
        $sentence = "Re: FREE Bankruptcy Case Evaluation for jannie	Stop. Sent from Yahoo Mail on Android. On Mon, Oct 12, 2020 at 8:04 PM, BankruptcyInfo wrote:";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
    }

    /** @test */
    public function example_19()
    {
        $sentence = "TM: Re: Customized auto coverage at an affordable price	Stop messaging. On Tue, Oct 20, 2020, 8:59 PM Carshield Quote <. rentown@rtowning.tailorednews.com> wrote:.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
    }

    /** @test */
    public function example_20()
    {
        $sentence = "Re: Discover lower auto insurance rates with GEICO!	I'm not interested bollshit. On Sat, Oct 17, 2020, 8:05 AM GEICO Auto Insurance <. info@thenewsreportnow.com> wrote:.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
    }

    /** @test */
    public function example_21()
    {
        $sentence = "Re: Why Wait? Resolve Your Credit Score	I'm not interested bollshit. On Fri, Oct 16, 2020, 11:06 AM Lexington Law. wrote:.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
    }

    /** @test */
    public function example_22()
    {
        $sentence = "Re: Talcum Powder Lawsuit - You May Qualify For Compensation	I'm not interested bollshit. On Fri, Oct 16, 2020, 8:04 AM Talcumpowderlawsuitsettlement.com <. info@thenewsreportnow.com> wrote:.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
    }

    /** @test */
    public function example_23()
    {
        $sentence = "Re: Less Than Perfect Credit? Thats OK! Apply Today!	I'm not interested bollshit. On Wed, Oct 14, 2020, 8:04 AM Reflex Card Partner. wrote:.";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
    }

    /** @test */
    public function example_24()
    {
        $sentence = "TM: Re: 📎Attached: Your upgraded 2.5 bedroom home	Stop!!!. On Mon, Oct 12, 2020, 8:43 PM Andrew. wrote:";
        $analyzer = new Sentiment();
        $this->assertEquals('neg', $analyzer->categorise($sentence));
    }
}