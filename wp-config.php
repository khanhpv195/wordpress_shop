<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'wordpress_black' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', 'ae6c8ec90274df576' );

/** Hostname của database */
define( 'DB_HOST', '45.122.222.53' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'R0gSPe]b.U)#-Hod ]Ax<_Hy`UHl-BZg;(k%Z{K/Q6Bx@Z7DKN?E2hYAy:B;J*#(' );
define( 'SECURE_AUTH_KEY',  ')|CzCO>_Z67~t$Sr7<A?n@V(O6;%0;jb&^Fwm0q8k(Wp>0F]T&GPIs/vo=U e0@*' );
define( 'LOGGED_IN_KEY',    'B>*>28Lo6=.5`[`r505$H5AwIJV_/A^Tz=i(}st].Njh>{|;e3@#?o2|n;VbZA8T' );
define( 'NONCE_KEY',        'n^kOpx@zZ5fwWW+X-k!yC3_-}G%V_=(B| ;f[{!yViO`%~Fqa6CzcDBkBt<3~]wO' );
define( 'AUTH_SALT',        ':I3=/x:C,j9;frCn|W~ir#0;$j-oBK4c0.;I3OeLd8v#&FH+hpc2^+zs5SU<;@P7' );
define( 'SECURE_AUTH_SALT', 'D{Irv/}A.|7f2n0j=zzrB;(P<9|5Pt{4sYGDo&2tv,>*,h=|_1pTho~?:kB F2Vh' );
define( 'LOGGED_IN_SALT',   '=,Ft}|s(y@9Bm{BO<z]ZUO])j78p14FQjO/pbH(P5YWoE2Usur}tcU/_`BmqA:>Q' );
define( 'NONCE_SALT',       'F.B#i8n12Ppyt.quJ+^^v^kee#Wf$JOSo<&Y&[1f2$0-Yn*&*I|wm4lS2y?q`Zve' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
