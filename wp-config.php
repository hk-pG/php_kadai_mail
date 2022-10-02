<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * データベース設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** データベース設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'ei2030' );

/** データベースのユーザー名 */
define( 'DB_USER', 'ei2030' );

/** データベースのパスワード */
define( 'DB_PASSWORD', 'ei2030@alumni.hamako-ths.ed.jp' );

/** データベースのホスト名 */
define( 'DB_HOST', 'alumni' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'uH$R#(N-v/KN>8voE[ vx@7:gch].wh,{t?dA{Fp< PrfD[Kfuo|b8<$0d;dw~f%' );
define( 'SECURE_AUTH_KEY',  '&;$bPm|B_%n$CTo>lq[8pLx&+L]d}/K.$h-r?2e;-`W>8,(.AS62 kQh$ts{KsOM' );
define( 'LOGGED_IN_KEY',    'vgNTQ,iJ32bkWulCJ)W9oc2>>L<7QNG%4Hho$Y wU![]@Hh$E0U>0puax<a7v[M(' );
define( 'NONCE_KEY',        'MG)PaEN$Z0T113elSM%_?L(CC3Z(0KN,~[2DVL2fNJz2oH9.tSzR4g%4$pOi24+!' );
define( 'AUTH_SALT',        '*y*{s1LvJ.cq$P3}!VA(Pc??bCCdSPEte2X^40T6^>32$WCf{`XhVS]cGJ>D%Gf;' );
define( 'SECURE_AUTH_SALT', ':atb}{98Z,sRs~.zWF+:fdj/&LDD B3[C)Gz&Cs)5?!Obfdxojo2k*JMWz]a0UG3' );
define( 'LOGGED_IN_SALT',   '6ho*7aa B^?9tPKpmS^F>Y4W=D&;Rh*M<)D!z]oO6~t qP-Pqz`WM$L:pZm{2KvA' );
define( 'NONCE_SALT',       'as`z=mKyn0#qj88KT75tYXMhpjx1wF:&.??% Z@_T _|jg,[}PAIe^Qr&A.C MQ%' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'ei2030';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

