<?php get_header(); ?>

<section class="ai-section">
    <div class="ai-container">
        <div class="ai-title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="ai-response">
            <p id="ai-query"></p>
            <p id="ai-response">Smart Chat....</p>
            <div class="loader"></div>
        </div>
        <div class="functional-btns">
            <button id="copy-text">Copy Response</button>
            <span id="success">Text Copied!</span>
        </div>
        <div class="get-query">
            <input type="text" id="get-query" placeholder="Enter you query...." />
        </div>
    </div>
</section>

<?php get_footer(); ?>