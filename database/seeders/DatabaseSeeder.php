<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::factory()->create([
            'name' => '山田 奈緒子',
            'username' => 'NaokoYamada',
        ]);

        $user2 = User::factory()->create([
            'name' => '上田 次郎',
            'username' => 'JiroUeda',
        ]);

        $user3 = User::factory()->create([
            'name' => '矢部 謙三',
            'username' => 'KenzoYabe',
        ]);

        $category1 = Category::factory()->create([
            'name' => '超常現象',
        ]);

        $category2 = Category::factory()->create([
            'name' => 'ベスト',
        ]);

        $category3 = Category::factory()->create([
            'name' => '警部補',
        ]);

        Post::factory()->create([
            'user_id' => $user1->id,
            'category_id' => $category1->id,
            'title' => '全部まるっとお見通しだ！',
            'body' => 'ちまたには日本科学技術大学・上田次郎の「どす来い、超常現象」というインチキ臭い本が出回ってるそうですね。しかもそこそこ売れてるみたいですけど、あそこにかかれていることは１／８くらいフィクションです。あそこに書かれた事件の数々は、本当は私が解決したものばかりなんです。',
        ]);

        Post::factory()->create([
            'user_id' => $user2->id,
            'category_id' => $category1->id,
            'title' => 'どんと来い、超常現象',
            'body' => 'そもそも、三次元の空間で構成されているこの地球上において、物理学の法則で解明できない現象など皆無である。裏を返せば、すべての超常現象は、物理学によっていともたやすく証明できてしまうのだ。そして、物理学の権威である私の前では、世の中にはびこるエセ霊能力者やニセ超能力者が仕組んだオカルトなど、まったく無意味な存在である。',
        ]);

        Post::factory()->create([
            'user_id' => $user2->id,
            'category_id' => $category2->id,
            'title' => 'なぜベストを尽くさないのか',
            'body' => '物理学を信望し、今やその権威となった私には、怖いものなど何もない。物理学をもってすれば解明できぬ現象など存在しないことは現在までの私の天才的な頭脳によって証明済みであり、すでに皆さんがご存じのとおりである。そこで今回は、ある意味で国民的アイドルとも言える私の、一人の人間としてのプライベートな生き方や考え方、私の人生哲学を記した。いくら私が天才であってもこれほどの成功を手にするまでには秘密が隠されていたのだ。「なぜベストを尽くさないのか」私は困難に立ち向かう旅に鏡に向かってこの秘密の呪文を唱えてきたはたまたそれが私のベストを着る理由でもある。私は半端なことが嫌いなタイプである。そう、私は常に「ベスト」でいたい。',
        ]);

        Post::factory()->create([
            'user_id' => $user3->id,
            'category_id' => $category3->id,
            'title' => 'ワシを誰や思とんねん。警部補、矢部謙三やぞ！',
            'body' => 'これはね頭から直に生えてるもんなんで',
        ]);

        Post::factory(3)->create([
            'user_id' => $user1->id,
        ]);

        Post::factory(3)->create([
            'category_id' => $category1->id,
        ]);
    }
}
