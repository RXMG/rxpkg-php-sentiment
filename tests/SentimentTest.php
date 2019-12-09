<?php

use PHPInsight\Sentiment;
use PHPUnit\Framework\TestCase;

class SentimentTest extends TestCase
{
    private $strings = [
        'Weather today is rubbish',
        'This cake looks amazing',
        'His skills are mediocre',
        'He is very talented',
        'She is seemingly very agressive',
        'Marie was enthusiastic about the upcoming trip. Her brother was also passionate about her leaving - he would finally have the house for himself.',
        'To be or not to be?',
        'To be or not to be unsubscribe from me aaaaaa',
        'guys i got this game 2 days ago and i found it great in every aspect so why zero everything improved i love the story . i love to be like a commander as commander shepherd in mass effect and guide my army it feels good . maybe some fighting mechanic in the first chapter was better but it is great as a final',
        'a very good game that could have been a lot better.\r the graphics are good, the gameplay is smooth and the campaing, besides it is a little short, it is very enjoyable\r :3',
        'genuinely one of the worst, most boring and feeble games i’ve ever played. thank god i got it on ea access. no campaign. simple and boring customisation. ui problems everywhere. can’t understand any of the menus. bad gameplay. bad sound. awful flight mechanics. boring maps with not enough cover. terrible character movement. not actually great graphics. i could go on. but it’s boring me.',
        'simply horrible. dlc full of glitches, lack of information, boring events and short and expensive. don`t buy, run away and play another game, forget destiny and bungie'
    ];

    private $results = [
        ['category' => 'neg', 'neg' => 0.5, 'neu' => 0.251, 'pos' => 0.25],
        ['category' => 'pos', 'pos' => 0.5, 'neu' => 0.251, 'neg' => 0.25],
        ['category' => 'neu', 'neu' => 0.501, 'pos' => 0.25, 'neg' => 0.25],
        ['category' => 'pos', 'pos' => 0.5, 'neu' => 0.251, 'neg' => 0.25],
        ['category' => 'neu', 'neu' => 0.501, 'pos' => 0.25, 'neg' => 0.25,],
        ['category' => 'pos', 'pos' => 0.571, 'neu' => 0.286, 'neg' => 0.143,],
        ['category' => 'neu', 'neu' => 0.334, 'pos' => 0.333, 'neg' => 0.333,],
        ['category' => 'neg', 'neg' => 0.5, 'neu' => 0.251, 'pos' => 0.25,],
        ['category' => 'pos', 'pos' => 0.97, 'neg' => 0.015, 'neu' => 0.015,],
        ['category' => 'pos', 'pos' => 0.727, 'neg' => 0.182, 'neu' => 0.091,],
        ['category' => 'neg', 'neg' => 0.992, 'pos' => 0.008, 'neu' => 0,],
        ['category' => 'neg', 'neg' => 0.865, 'neu' => 0.108, 'pos' => 0.027,],
    ];

    /** @test */
    public function analyze_sentiment()
    {
        $analyzer = new Sentiment();
        foreach ($this->strings as $index => $string) {
            echo "\nTest Row #$index";
            $scores = $analyzer->score($string);
            $this->assertEquals($this->results[$index]['category'], $analyzer->categorise($string));
            $this->assertEquals($this->results[$index]['neg'], $scores['neg']);
            $this->assertEquals($this->results[$index]['neu'], $scores['neu']);
            $this->assertEquals($this->results[$index]['pos'], $scores['pos']);
        }
    }

    /** @test */
    public function analyze_sentiment_negative_words()
    {
        $analyzer = new Sentiment();
        $result = $analyzer->score($this->strings[7]);
        $this->assertNotEmpty($result['neg_words']);
        $this->assertCount(1, $result['neg_words']);

        $result = $analyzer->score($this->strings[11]);
        $this->assertNotEmpty($result['neg_words']);
        $this->assertCount(6, $result['neg_words']);
    }

    /** @test */
    public function analyze_sentiment_positive_words()
    {
        $analyzer = new Sentiment();
        $result = $analyzer->score($this->strings[1]);
        $this->assertNotEmpty($result['pos_words']);
        $this->assertCount(1, $result['pos_words']);

        $result = $analyzer->score($this->strings[3]);
        $this->assertNotEmpty($result['pos_words']);
        $this->assertCount(1, $result['pos_words']);
    }
}