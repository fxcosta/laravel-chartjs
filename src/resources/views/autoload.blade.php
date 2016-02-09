<script>
    /**
     * This script is to allow for more than one window.onload in our page,
     * in case we need to use more than one chart per page
     */

    /**
     * The addLoadEvent function.
     * @author Willison, Simon (http://simonwillison.net/)
     */
    function addLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        } else {
            window.onload = function() {
                if (oldonload) {
                    oldonload();
                }
                func();
            }
        }
    }
</script>