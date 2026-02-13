<?php

namespace App\Services;

class MockDataService
{
    public static function getFeaturedNovels(): array
    {
        return [
            [
                'id' => 1,
                'slug' => 'the-celestial-throne',
                'title' => 'The Celestial Throne',
                'author' => 'Elena Blackwood',
                'cover' => 'https://picsum.photos/seed/novel1/400/600',
                'synopsis' => 'In a world where gods have abandoned their thrones, a young sorcerer must ascend to claim the power that could save—or destroy—everything. As ancient seals crack and forgotten beasts awaken, Kael must navigate a web of political intrigue and dark magic to find his destiny among the stars.',
                'tags' => ['Fantasy', 'Adventure', 'Magic'],
                'rating' => 4.8,
                'views' => 1250000,
                'chapters' => 245,
                'status' => 'Ongoing',
            ],
            [
                'id' => 2,
                'slug' => 'neon-dynasty',
                'title' => 'Neon Dynasty',
                'author' => 'Marcus Chen',
                'cover' => 'https://picsum.photos/seed/novel2/400/600',
                'synopsis' => 'Tokyo, 2087. Cybernetic enhancements are the new currency of power. When hacker-for-hire Yuki Tanaka stumbles upon a conspiracy that reaches the highest levels of the corporate oligarchy, she must decide whether to sell the secret or burn it all down.',
                'tags' => ['Sci-Fi', 'Cyberpunk', 'Thriller'],
                'rating' => 4.6,
                'views' => 980000,
                'chapters' => 189,
                'status' => 'Ongoing',
            ],
            [
                'id' => 3,
                'slug' => 'whispers-of-the-abyss',
                'title' => 'Whispers of the Abyss',
                'author' => 'Sarah Nightingale',
                'cover' => 'https://picsum.photos/seed/novel3/400/600',
                'synopsis' => 'Deep beneath the ocean lies a city that shouldn\'t exist. Marine biologist Dr. Lena Vasquez discovers an underwater civilization with technology far beyond human understanding. But the deeper she descends, the more she realizes the abyss is whispering back.',
                'tags' => ['Horror', 'Mystery', 'Sci-Fi'],
                'rating' => 4.9,
                'views' => 2100000,
                'chapters' => 312,
                'status' => 'Completed',
            ],
            [
                'id' => 4,
                'slug' => 'the-last-alchemist',
                'title' => 'The Last Alchemist',
                'author' => 'David Ashford',
                'cover' => 'https://picsum.photos/seed/novel4/400/600',
                'synopsis' => 'In a steampunk Victorian London, alchemy is outlawed and its practitioners hunted. Elara, the last known alchemist, must brew the Philosopher\'s Stone before the Crown\'s Inquisitors find her—or before the plague consumes the city entirely.',
                'tags' => ['Steampunk', 'Fantasy', 'Romance'],
                'rating' => 4.7,
                'views' => 870000,
                'chapters' => 156,
                'status' => 'Ongoing',
            ],
            [
                'id' => 5,
                'slug' => 'shadow-sovereign',
                'title' => 'Shadow Sovereign',
                'author' => 'Jin Woo Park',
                'cover' => 'https://picsum.photos/seed/novel5/400/600',
                'synopsis' => 'After dying in a dungeon raid, hunter Sung Jinwoo awakens with a mysterious System that only he can see. Leveling up in secret, he rises from the weakest hunter to a power that transcends human understanding—the Shadow Sovereign.',
                'tags' => ['Action', 'Fantasy', 'LitRPG'],
                'rating' => 4.9,
                'views' => 5200000,
                'chapters' => 270,
                'status' => 'Completed',
            ],
        ];
    }

    public static function getRankings(): array
    {
        return [
            ['rank' => 1, 'slug' => 'shadow-sovereign', 'title' => 'Shadow Sovereign', 'author' => 'Jin Woo Park', 'cover' => 'https://picsum.photos/seed/novel5/400/600', 'views' => 5200000, 'rating' => 4.9, 'genre' => 'Action'],
            ['rank' => 2, 'slug' => 'whispers-of-the-abyss', 'title' => 'Whispers of the Abyss', 'author' => 'Sarah Nightingale', 'cover' => 'https://picsum.photos/seed/novel3/400/600', 'views' => 2100000, 'rating' => 4.9, 'genre' => 'Horror'],
            ['rank' => 3, 'slug' => 'the-celestial-throne', 'title' => 'The Celestial Throne', 'author' => 'Elena Blackwood', 'cover' => 'https://picsum.photos/seed/novel1/400/600', 'views' => 1250000, 'rating' => 4.8, 'genre' => 'Fantasy'],
            ['rank' => 4, 'slug' => 'neon-dynasty', 'title' => 'Neon Dynasty', 'author' => 'Marcus Chen', 'cover' => 'https://picsum.photos/seed/novel2/400/600', 'views' => 980000, 'rating' => 4.6, 'genre' => 'Sci-Fi'],
            ['rank' => 5, 'slug' => 'the-last-alchemist', 'title' => 'The Last Alchemist', 'author' => 'David Ashford', 'cover' => 'https://picsum.photos/seed/novel4/400/600', 'views' => 870000, 'rating' => 4.7, 'genre' => 'Steampunk'],
            ['rank' => 6, 'slug' => 'crimson-blade-chronicles', 'title' => 'Crimson Blade Chronicles', 'author' => 'Akira Tanaka', 'cover' => 'https://picsum.photos/seed/novel6/400/600', 'views' => 760000, 'rating' => 4.5, 'genre' => 'Action'],
            ['rank' => 7, 'slug' => 'the-void-walker', 'title' => 'The Void Walker', 'author' => 'Olivia Storm', 'cover' => 'https://picsum.photos/seed/novel7/400/600', 'views' => 650000, 'rating' => 4.4, 'genre' => 'Fantasy'],
            ['rank' => 8, 'slug' => 'digital-ghosts', 'title' => 'Digital Ghosts', 'author' => 'Ryan Kim', 'cover' => 'https://picsum.photos/seed/novel8/400/600', 'views' => 540000, 'rating' => 4.3, 'genre' => 'Sci-Fi'],
            ['rank' => 9, 'slug' => 'empire-of-dust', 'title' => 'Empire of Dust', 'author' => 'Fatima Al-Rashid', 'cover' => 'https://picsum.photos/seed/novel9/400/600', 'views' => 430000, 'rating' => 4.5, 'genre' => 'Fantasy'],
            ['rank' => 10, 'slug' => 'moonlit-academy', 'title' => 'Moonlit Academy', 'author' => 'Clara Reeves', 'cover' => 'https://picsum.photos/seed/novel10/400/600', 'views' => 380000, 'rating' => 4.2, 'genre' => 'Romance'],
        ];
    }

    public static function getNewReleases(): array
    {
        return [
            ['slug' => 'iron-covenant', 'title' => 'Iron Covenant', 'author' => 'Viktor Novak', 'cover' => 'https://picsum.photos/seed/new1/400/600', 'tags' => ['Fantasy', 'Dark'], 'chapters' => 12, 'rating' => 4.1, 'status' => 'Ongoing'],
            ['slug' => 'starfall-protocol', 'title' => 'Starfall Protocol', 'author' => 'Zara Mitchell', 'cover' => 'https://picsum.photos/seed/new2/400/600', 'tags' => ['Sci-Fi', 'Space'], 'chapters' => 8, 'rating' => 4.3, 'status' => 'Ongoing'],
            ['slug' => 'the-enchantress-gambit', 'title' => 'The Enchantress Gambit', 'author' => 'Mei Lin', 'cover' => 'https://picsum.photos/seed/new3/400/600', 'tags' => ['Romance', 'Fantasy'], 'chapters' => 15, 'rating' => 4.0, 'status' => 'Ongoing'],
            ['slug' => 'quantum-thief', 'title' => 'Quantum Thief', 'author' => 'Leo Brooks', 'cover' => 'https://picsum.photos/seed/new4/400/600', 'tags' => ['Thriller', 'Sci-Fi'], 'chapters' => 22, 'rating' => 4.4, 'status' => 'Ongoing'],
            ['slug' => 'blood-meridian-online', 'title' => 'Blood Meridian Online', 'author' => 'Hassan Ali', 'cover' => 'https://picsum.photos/seed/new5/400/600', 'tags' => ['LitRPG', 'Action'], 'chapters' => 30, 'rating' => 4.6, 'status' => 'Ongoing'],
            ['slug' => 'the-witch-of-endor', 'title' => 'The Witch of Endor', 'author' => 'Isabella Cruz', 'cover' => 'https://picsum.photos/seed/new6/400/600', 'tags' => ['Horror', 'Historical'], 'chapters' => 18, 'rating' => 4.2, 'status' => 'Ongoing'],
        ];
    }

    public static function getNovelDetails(string $slug): array
    {
        $novels = collect(self::getFeaturedNovels())->keyBy('slug');

        $novel = $novels->get($slug, [
            'id' => 99,
            'slug' => $slug,
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'author' => 'Unknown Author',
            'cover' => 'https://picsum.photos/seed/' . $slug . '/400/600',
            'synopsis' => 'A thrilling tale that will keep you on the edge of your seat. Every chapter reveals new mysteries and deeper layers of an intricate world. Follow our protagonist as they navigate challenges, forge alliances, and uncover the truth hidden beneath layers of deception.',
            'tags' => ['Fantasy', 'Adventure'],
            'rating' => 4.5,
            'views' => 500000,
            'chapters' => 20,
            'status' => 'Ongoing',
        ]);

        $chapters = [];
        $totalChapters = min($novel['chapters'] ?? 20, 20);
        for ($i = 1; $i <= $totalChapters; $i++) {
            $chapters[] = [
                'number' => $i,
                'title' => "Chapter {$i}: " . self::getChapterTitle($i),
                'is_locked' => $i > 5,
                'date' => now()->subDays($totalChapters - $i)->format('M d, Y'),
                'words' => rand(2000, 5000),
            ];
        }

        $novel['chapter_list'] = $chapters;
        $novel['total_chapters'] = $totalChapters;

        return $novel;
    }

    private static function getChapterTitle(int $num): string
    {
        $titles = [
            1 => 'The Awakening',
            2 => 'Into the Unknown',
            3 => 'Shadows Gather',
            4 => 'The First Trial',
            5 => 'Bonds Forged in Fire',
            6 => 'A Dangerous Alliance',
            7 => 'The Hidden Truth',
            8 => 'Storm on the Horizon',
            9 => 'The Price of Power',
            10 => 'Betrayal at Dusk',
            11 => 'Echoes of the Past',
            12 => 'The Forbidden Path',
            13 => 'Rise of the Fallen',
            14 => 'Clash of Titans',
            15 => 'The Dark Revelation',
            16 => 'Shattered Illusions',
            17 => 'The Final Gambit',
            18 => 'Beyond the Veil',
            19 => 'Reckoning',
            20 => 'A New Dawn',
        ];

        return $titles[$num] ?? "Untitled Chapter";
    }

    public static function getChapterContent(string $slug, int $chapterNum): array
    {
        $novel = self::getNovelDetails($slug);
        $chapter = collect($novel['chapter_list'])->firstWhere('number', $chapterNum);

        $paragraphs = [
            "The morning light filtered through the ancient windows, casting long golden rays across the stone floor. Dust motes danced lazily in the beams, undisturbed by the quiet footsteps that echoed through the vast hall. It was a place of power, of memory, and of secrets that had been kept for millennia.",

            "She stood at the threshold, her hand resting on the cold iron handle of the door. Beyond it lay answers she had been seeking for years—answers that could change the course of history or doom it to repeat its darkest chapters. The weight of the decision pressed heavily upon her shoulders.",

            "\"You don't have to do this alone,\" a voice said from behind her. She turned to find Kael leaning against the archway, his arms crossed and his expression unreadable. His silver eyes caught the light like molten mercury, betraying none of the turmoil she knew raged beneath his calm exterior.",

            "\"I know,\" she replied, her voice steady despite the tremor in her hands. \"But some paths are meant to be walked alone.\" She pushed the door open before he could argue further, stepping into the darkness that awaited beyond.",

            "The chamber was vast—far larger than the exterior of the building suggested. Impossible architecture stretched in every direction: staircases that led to nowhere, corridors that curved back upon themselves, and doorways that opened onto starfields. This was the Nexus, the point where all realities converged.",

            "Her footsteps rang hollow on the obsidian floor as she approached the central pedestal. Upon it sat a crystalline orb no larger than her fist, pulsing with an inner light that shifted through every color of the spectrum. This was what she had come for. This was the Heartstone.",

            "As her fingers closed around it, the world shattered. Not physically—the walls remained standing, the floor solid beneath her feet—but something fundamental about reality itself seemed to fracture. She could feel it: timelines splitting, possibilities branching, futures being written and rewritten in the space between heartbeats.",

            "Visions flooded her mind. She saw cities burning and cities rising from the ashes. She saw wars fought with weapons of light and wars fought with whispered words. She saw herself, standing at this very spot, in a thousand different lifetimes, making a thousand different choices.",

            "\"The stone shows you what could be,\" a new voice said—ancient, resonant, seemingly coming from everywhere at once. \"But it cannot tell you what should be. That burden, child, is yours alone to bear.\"",

            "She opened her eyes—when had she closed them?—and found herself no longer in the Nexus. She stood on a cliff overlooking an endless ocean, the sky above her split between brilliant sunset and encroaching night. The Heartstone was warm in her palm, its light now a steady, gentle pulse.",

            "The wind carried the salt spray up to where she stood, mingling with the scent of wildflowers that grew stubbornly among the rocks. Below, waves crashed against the cliff face with a rhythm as old as the world itself—patient, relentless, eternal.",

            "She thought about everything that had led her here: the friends she had lost, the enemies she had made, the truths she had uncovered and the lies she had been forced to tell. Each step of the journey had carved something away from who she used to be, leaving behind someone harder, sharper, but also more fragile in ways she hadn't expected.",

            "\"Every ending is a beginning,\" she whispered to herself, turning the Heartstone over in her hands. Its light pulsed in response, as if acknowledging her words. Or perhaps it was simply reflecting the last rays of the dying sun.",

            "Behind her, the portal back to the Nexus still shimmered, a doorway of liquid silver hanging impossibly in the air. She could go back. She could undo everything, start over, choose differently. The stone gave her that power.",

            "But she had learned something in her journey through the Nexus—something that no amount of power could change. The past was not a mistake to be corrected. It was a foundation to be built upon. Every scar, every loss, every moment of doubt had shaped her into the person who could stand here now and make this choice.",

            "She turned her back on the portal and faced the ocean. The night was falling, but she was not afraid of the dark. She never had been. The dark was just another kind of canvas, waiting for light to give it meaning.",
        ];

        return [
            'novel' => $novel,
            'chapter' => $chapter ?? ['number' => $chapterNum, 'title' => "Chapter {$chapterNum}", 'is_locked' => false],
            'content' => $paragraphs,
            'prev_chapter' => $chapterNum > 1 ? $chapterNum - 1 : null,
            'next_chapter' => $chapterNum < ($novel['total_chapters'] ?? 20) ? $chapterNum + 1 : null,
        ];
    }

    public static function getUserLibrary(): array
    {
        return [
            ['slug' => 'shadow-sovereign', 'title' => 'Shadow Sovereign', 'author' => 'Jin Woo Park', 'cover' => 'https://picsum.photos/seed/novel5/400/600', 'progress' => 75, 'last_chapter' => 202, 'total_chapters' => 270, 'last_read' => '2 hours ago'],
            ['slug' => 'the-celestial-throne', 'title' => 'The Celestial Throne', 'author' => 'Elena Blackwood', 'cover' => 'https://picsum.photos/seed/novel1/400/600', 'progress' => 42, 'last_chapter' => 103, 'total_chapters' => 245, 'last_read' => '1 day ago'],
            ['slug' => 'neon-dynasty', 'title' => 'Neon Dynasty', 'author' => 'Marcus Chen', 'cover' => 'https://picsum.photos/seed/novel2/400/600', 'progress' => 18, 'last_chapter' => 34, 'total_chapters' => 189, 'last_read' => '3 days ago'],
            ['slug' => 'whispers-of-the-abyss', 'title' => 'Whispers of the Abyss', 'author' => 'Sarah Nightingale', 'cover' => 'https://picsum.photos/seed/novel3/400/600', 'progress' => 100, 'last_chapter' => 312, 'total_chapters' => 312, 'last_read' => '1 week ago'],
            ['slug' => 'the-last-alchemist', 'title' => 'The Last Alchemist', 'author' => 'David Ashford', 'cover' => 'https://picsum.photos/seed/novel4/400/600', 'progress' => 5, 'last_chapter' => 8, 'total_chapters' => 156, 'last_read' => '2 weeks ago'],
        ];
    }

    public static function getUserWallet(): array
    {
        return [
            'balance' => 2450,
            'currency' => 'Coins',
            'transactions' => [
                ['id' => 'TXN-001', 'type' => 'purchase', 'description' => 'Purchased 500 Coins', 'amount' => 500, 'date' => '2026-02-13', 'status' => 'completed'],
                ['id' => 'TXN-002', 'type' => 'unlock', 'description' => 'Unlocked Ch.203 - Shadow Sovereign', 'amount' => -15, 'date' => '2026-02-12', 'status' => 'completed'],
                ['id' => 'TXN-003', 'type' => 'unlock', 'description' => 'Unlocked Ch.204 - Shadow Sovereign', 'amount' => -15, 'date' => '2026-02-12', 'status' => 'completed'],
                ['id' => 'TXN-004', 'type' => 'purchase', 'description' => 'Purchased 1000 Coins', 'amount' => 1000, 'date' => '2026-02-10', 'status' => 'completed'],
                ['id' => 'TXN-005', 'type' => 'unlock', 'description' => 'Unlocked Ch.104 - The Celestial Throne', 'amount' => -20, 'date' => '2026-02-09', 'status' => 'completed'],
                ['id' => 'TXN-006', 'type' => 'gift', 'description' => 'Welcome Bonus', 'amount' => 100, 'date' => '2026-02-01', 'status' => 'completed'],
                ['id' => 'TXN-007', 'type' => 'purchase', 'description' => 'Purchased 200 Coins', 'amount' => 200, 'date' => '2026-01-28', 'status' => 'completed'],
                ['id' => 'TXN-008', 'type' => 'unlock', 'description' => 'Unlocked Ch.35 - Neon Dynasty', 'amount' => -10, 'date' => '2026-01-25', 'status' => 'completed'],
            ],
        ];
    }

    public static function getAuthorNovels(): array
    {
        return [
            'stats' => [
                'total_reads' => 3450000,
                'total_income' => 12850,
                'active_novels' => 3,
                'total_followers' => 28400,
            ],
            'novels' => [
                [
                    'id' => 1,
                    'slug' => 'the-celestial-throne',
                    'title' => 'The Celestial Throne',
                    'cover' => 'https://picsum.photos/seed/novel1/400/600',
                    'status' => 'Ongoing',
                    'chapters' => 245,
                    'views' => 1250000,
                    'earnings' => 5200.00,
                    'rating' => 4.8,
                    'last_updated' => '2026-02-13',
                ],
                [
                    'id' => 2,
                    'slug' => 'whispers-of-the-abyss',
                    'title' => 'Whispers of the Abyss',
                    'cover' => 'https://picsum.photos/seed/novel3/400/600',
                    'status' => 'Completed',
                    'chapters' => 312,
                    'views' => 2100000,
                    'earnings' => 6800.00,
                    'rating' => 4.9,
                    'last_updated' => '2026-01-15',
                ],
                [
                    'id' => 3,
                    'slug' => 'iron-covenant',
                    'title' => 'Iron Covenant',
                    'cover' => 'https://picsum.photos/seed/new1/400/600',
                    'status' => 'Ongoing',
                    'chapters' => 12,
                    'views' => 100000,
                    'earnings' => 850.00,
                    'rating' => 4.1,
                    'last_updated' => '2026-02-11',
                ],
            ],
        ];
    }

    public static function getAllNovels(): array
    {
        return array_merge(self::getFeaturedNovels(), self::getNewReleases());
    }
}
