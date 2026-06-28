<?php
/**
 * Helper to write log files using file_put_contents.
 * Logs are saved in the 'app_logs' directory, which is located at the same level as the '.secrets' directory.
 */

if (!function_exists('get_logs_directory')) {
    /**
     * Determines the path to the 'app_logs' directory.
     * It looks for the location of the '.secrets' directory (in the same manner as config.php)
     * and positions 'app_logs' at that same level.
     * 
     * @return string
     */
    function get_logs_directory() {
        $documentRoot = isset($_SERVER['DOCUMENT_ROOT']) ? rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) : '';
        
        // 1. Check if .secrets exists one level above document root
        if ($documentRoot !== '') {
            $parent = dirname($documentRoot);
            if (is_dir($parent . DIRECTORY_SEPARATOR . '.secrets')) {
                return $parent . DIRECTORY_SEPARATOR . 'app_logs';
            }
            
            // 2. Check if .secrets exists two levels above document root (for public_html setups)
            if (stripos($documentRoot, 'public_html') !== false) {
                $parent2 = dirname($parent);
                if (is_dir($parent2 . DIRECTORY_SEPARATOR . '.secrets')) {
                    return $parent2 . DIRECTORY_SEPARATOR . 'app_logs';
                }
            }
        }
        
        // 3. Fallback based on APPROOT (project root)
        if (defined('APPROOT')) {
            $projectRoot = dirname(APPROOT);
            
            // Check if .secrets is in project root
            if (is_dir($projectRoot . DIRECTORY_SEPARATOR . '.secrets')) {
                return $projectRoot . DIRECTORY_SEPARATOR . 'app_logs';
            }
            
            // Check if .secrets is in project parent
            $projectParent = dirname($projectRoot);
            if (is_dir($projectParent . DIRECTORY_SEPARATOR . '.secrets')) {
                return $projectParent . DIRECTORY_SEPARATOR . 'app_logs';
            }
            
            // If .secrets directory doesn't exist, place app_logs in the project root
            return $projectRoot . DIRECTORY_SEPARATOR . 'app_logs';
        }
        
        // 4. Generic fallback based on document root
        if ($documentRoot !== '') {
            return dirname($documentRoot) . DIRECTORY_SEPARATOR . 'app_logs';
        }
        
        // 5. Hard fallback to the grandparent of this file's folder
        return dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'app_logs';
    }
}

if (!function_exists('write_app_log')) {
    /**
     * Writes log content to a file in the 'app_logs' directory.
     * Automatically appends the current date (YYYY-MM-DD) to the filename and ensures it is a .txt file.
     * 
     * @param string $filename The original filename (e.g. 'stepLog.txt' or 'receiving')
     * @param mixed $content The log content to write
     * @param int $flags Optional flags for file_put_contents (e.g. FILE_APPEND)
     * @return int|false Number of bytes written, or false on failure
     */
    function write_app_log($filename, $content, $flags = 0) {
        // Extract the base name (ignore any leading directories)
        $baseName = basename($filename);
        
        // Get the filename without extension
        $nameWithoutExt = pathinfo($baseName, PATHINFO_FILENAME);
        
        // Append the current date and ensure the extension is .txt
        $date = date('Y-m-d');
        $newFilename = $nameWithoutExt . '_' . $date . '.txt';
        
        // Get the correct logs directory
        $logDir = get_logs_directory();
        
        // Create the directory if it doesn't exist
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }
        
        // Write the log
        $filePath = $logDir . DIRECTORY_SEPARATOR . $newFilename;
        return file_put_contents($filePath, $content, $flags);
    }
}
