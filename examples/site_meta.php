<?php

function getSiteMeta(): array {
    return [
        'site_name'        => '爱游戏',
        'domain'           => 'https://index-home-i-game.com.cn',
        'description'      => '爱游戏是一个专注于游戏资讯和娱乐的综合平台。',
        'keywords'         => ['游戏', '攻略', '评测', '爱游戏'],
        'author'           => 'Game Studio',
        'language'         => 'zh-CN',
        'charset'          => 'UTF-8',
        'year'             => date('Y'),
        'version'          => '2.3.1',
        'short_description'=> '发现游戏乐趣，尽在爱游戏。',
        'contact_email'    => 'support@index-home-i-game.com.cn',
        'last_updated'     => '2025-03-21',
    ];
}

function buildDescriptionText(array $meta): string {
    $parts = [];

    if (!empty($meta['site_name'])) {
        $parts[] = '站点：' . $meta['site_name'];
    }
    if (!empty($meta['domain'])) {
        $parts[] = '域名：' . $meta['domain'];
    }
    if (!empty($meta['description'])) {
        $parts[] = '简介：' . $meta['description'];
    }
    if (!empty($meta['keywords'])) {
        $parts[] = '关键词：' . implode('、', $meta['keywords']);
    }
    if (!empty($meta['version'])) {
        $parts[] = '版本：' . $meta['version'];
    }
    if (!empty($meta['year'])) {
        $parts[] = '©' . $meta['year'] . ' ' . $meta['site_name'];
    }

    return implode(' | ', $parts);
}

function generateShortIntro(array $meta, int $maxLen = 160): string {
    $base = $meta['short_description'] ?? '';

    if ($maxLen <= 0) {
        return '';
    }

    if (mb_strlen($base) > $maxLen) {
        return mb_substr($base, 0, $maxLen - 3) . '...';
    }

    return $base;
}

function generateHtmlMetaTags(array $meta): string {
    $html = '';

    $html .= '<meta charset="' . htmlspecialchars($meta['charset'] ?? 'UTF-8', ENT_QUOTES, 'UTF-8') . '" />' . "\n";
    $html .= '<meta name="description" content="' . htmlspecialchars($meta['description'] ?? '', ENT_QUOTES, 'UTF-8') . '" />' . "\n";
    $html .= '<meta name="keywords" content="' . htmlspecialchars(implode(',', $meta['keywords'] ?? []), ENT_QUOTES, 'UTF-8') . '" />' . "\n";
    $html .= '<meta name="author" content="' . htmlspecialchars($meta['author'] ?? '', ENT_QUOTES, 'UTF-8') . '" />' . "\n";
    $html .= '<meta name="language" content="' . htmlspecialchars($meta['language'] ?? 'zh-CN', ENT_QUOTES, 'UTF-8') . '" />' . "\n";

    return $html;
}

// 示例使用
$siteMeta = getSiteMeta();

echo "完整描述文本：\n";
echo buildDescriptionText($siteMeta) . "\n\n";

echo "短介绍（限制80字符）：\n";
echo generateShortIntro($siteMeta, 80) . "\n\n";

echo "生成的HTML meta标签：\n";
echo generateHtmlMetaTags($siteMeta) . "\n";

echo "站点名称：爱游戏\n";