<?php
if (!function_exists('wptb_awards')) {
    function wptb_awards($params) {
        // Default values to prevent errors
        $defaults = [
            'section_title' => '',
            'award_lists'   => [],
        ];
        
        // Merge defaults with passed parameters
        $params = wp_parse_args($params, $defaults);
        
        $section_title = esc_html($params['section_title']);
        $award_lists   = $params['award_lists'];
        ?>
        <section class="awoard__section">
            <div class="container">
                <div class="award__wraper table-responsive" data-aos="fade-up"
                data-aos-duration="2000">
                    <table class="table w-100">
                        <tbody>
                        <tr>
                            <td>
                                <span class="table__title">
                                <?php echo $section_title; ?>
                                </span>
                            </td>
                            <td class="cusnoe">
                                
                            </td>
                            <td class="text-end">
                                
                            </td>
                        </tr>
                        <?php if (!empty($award_lists)) : ?>
                            <?php foreach ($award_lists as $award) : ?>
                                <tr>
                                    <td><?php echo esc_html($award['award_title'] ?? 'N/A'); ?></td>
                                    <td><?php echo esc_html($award['award_sub_title'] ?? 'N/A'); ?></td>
                                    <td class="text-end"><?php echo esc_html($award['award_date'] ?? 'N/A'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center"><?php esc_html_e('No awards available.', 'wptb'); ?></td>
                            </tr>
                        <?php endif; ?>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <?php
    }
}
?>
