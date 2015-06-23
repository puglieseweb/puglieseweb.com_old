<?php 
// $title = "";
// $description = "";
// $keywords = "";
include $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; 
?><article>
	<header>
		<time class="updated" datetime="2011-10-29 11:11:03-0400" pubdate>29-10-2011</time>
		<?php require '../../../includes/profile_box.inc.php'; ?>
		<h2>Swing</h2>

	</header>
	<section>
		<section>
			<p>Resources:</p>
			<ul>
				<li><a href="http://flylib.com/books/en/2.652.1.175/1/">http://flylib.com/books/en/2.652.1.175/1/</a></li>
				<li><a href="http://www.difranco.net/cop2551/Notes/gui.htm">http://www.difranco.net/cop2551/Notes/gui.htm</a></li>
				<li><a
					href="http://www.cs.jhu.edu/%7Escott/oose/lectures/swing.shtml">http://www.cs.jhu.edu/~scott/oose/lectures/swing.shtml</a><br>
				</li>
			</ul>
		</section>
		<section>
			<p>
				Quick reference<br>
			</p>
			<ul>
				<li><a
					href="http://students.cs.byu.edu/%7Ecs340ta/fall2010/help/SwingQuickReference.html">http://students.cs.byu.edu/~cs340ta/fall2010/help/SwingQuickReference.html</a></li>
				<li><a
					href="http://www.javamex.com/tutorials/swing/components.shtml">http://www.javamex.com/tutorials/swing/components.shtml</a></li>
				<li><a
					href="http://www.javamex.com/tutorials/swing/components.shtml">Swing
						Component</a></li>
			</ul>
		</section>

		<section>
			<p>Layouts</p>
			<ul>
				<li><a
					href="http://www.java2s.com/Code/Java/Swing-JFC/DemonstratesBorderLayout.htm">Boreder
						Layout</a></li>
				<li><a
					href="http://www.java2s.com/Code/Java/Swing-JFC/Layout.htm">Others
						Layouts</a></li>
			</ul>
		</section>
	</section>

	<section>
		<p>To avoid deadlook starting a Swing program the main( ) should
			not call the Swing methods, but instead should submit a task to the
			event queue.</p>
		<p>
			We can submit manipulations through
			<code> SwingUtilities.invokeLater( )</code>
			.
		</p>
		<p>Code:
		<pre>
			<code>
import javax.swing.JFrame;
import javax.swing.SwingUtilities;
				
public class SwingConsole{
	private SwingConsole() {
		// Util Library
	}
	public static void run(final JFrame f, final int width, final int height) {
		SwingUtilities.invokeLater(new Runnable() {
			public void run() {
				f.setTitle(f.getClass().getSimpleName());
				f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
				f.setSize(width, height);
				f.setVisible(true);
			}
		});
	}
}
			</code>
</pre>
	</section>



	<p>
		JApplet, JFrame, JWindow, JDialog, JPanel, etc., can all contain and
		display <span style="font-weight: bold;" class="underline">Components</span>.
		<br> <br> <br>
	</p>
	<br>
	<h2>Class inheritance hierarchy diagrams</h2>
	<div calss="images">
		<a href="http://flylib.com/books/en/2.652.1.175/1/"><img
			alt="Swing
          class tree UML diagram"
			title="Swing inheritance UML diagram" src="images/getfile_001.gif"
			style="border: 0px solid;"></a><img alt="Swing UML class diagram"
			title="Swing UML class diagram" src="images/Swing_ClassHierarchy.gif">
	</div>
	<br> <a href="http://flylib.com/books/en/2.652.1.175/1/"><img
		alt="Swing
        class inheritance UML"
		title="Swing class inheritance UML" src="images/getfile.gif"
		style="border: 0px solid; width: 500px; height: 274px;"></a><br>
	<h2>Layout manager</h2>
	A <strong>Container </strong>uses a <strong>LayoutManager</strong>
	(aggregation relationship)<br> <br>
	<h2>
		Container<br>
	</h2>
	In <strong>Container</strong>, there&#8217;s a method called
	<code>setLayout( ) </code>
	that allows you to choose a different <strong>layout manager</strong><br>
	All other <strong>JFC/Swing top-level containers</strong> contains<span
		class="gergon"> aJRootPane</span>&nbsp;as its only child. The&nbsp;<span
		style="font-weight: bold;" class="gergon">content pane</span>&nbsp;provided
	by the root pane should,<span style="font-weight: bold;"
		class="underline"> as a rule, contain all the non-menu
		components displayed by the&nbsp;JFrame</span><br> <br>
	<h3>JComponents</h3>
	<p>
		<span><span style="">Container </span></span>is used to <a
			title="Related page for group">group</a> components. Frames, panels,
		and applets are examples of containers.
	</p>
	<p>
		<br> <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">JComponent
		</span></span>is a type of <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">Container
		</span></span>and a superclass of all the lightweight Swing components. <br>
	</p>
	<p>
		The GUI JComponent classes, such as <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">JButton
		</span></span>, <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">JTextField
		</span></span>, <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">JTextArea
		</span></span>, <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">JComboBox
		</span></span>, <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">JList
		</span></span>, <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">JRadioButton
		</span></span>, and <span><span style="font-size: x-small;">JMenu </span></span>,
		are subclasses of <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">JComponent
		</span></span>.
	</p>
	<br>
	<h3>JButton</h3>
	<code>
		JButton jbtOK = <span><span style="color: rgb(0, 0, 153);">new</span></span>
		JButton(<span><span style="color: rgb(0, 153, 204);">"OK"</span></span>);
		<br> System.out.println(jbtOK <span><span
			style="color: rgb(0, 0, 153);">instanceof</span></span> JButton); <br>
		System.out.println(jbtOK <span><span
			style="color: rgb(0, 0, 153);">instanceof</span></span> AbstractButton); <br>
		System.out.println(jbtOK <span><span
			style="color: rgb(0, 0, 153);">instanceof</span></span> JComponent); <br>
		System.out.println(jbtOK <span><span
			style="color: rgb(0, 0, 153);">instanceof</span></span> Container); <br>
		System.out.println(jbtOK <span><span
			style="color: rgb(0, 0, 153);">instanceof</span></span> Component);
	</code>
	<br>
	<ul>
		<li>CheckBox and RadioBox inherit form JTogleButton. Both
			component behavior in the same way.</li>
		<li>AbstractButton can be added to a ButtonGroup.</li>
	</ul>
	<h3>JTabbedPane</h3>
	<a
		href="http://download.oracle.com/javase/tutorial/uiswing/components/tabbedpane.html">http://download.oracle.com/javase/tutorial/uiswing/components/tabbedpane.html</a><br>
	Inserting a tab:<br>
	<ul>
		<li><code>addTab</code>&nbsp;method handles the bulk of the work
			in setting up a tab in a tabbed pane. The&nbsp;addTab&nbsp;method has
			several forms, but they all use both a string title and the component
			to be displayed by the tab.</li>
		<li><code>insertTab</code>&nbsp;method, which lets you specify
			the index of the tab you're adding</li>
	</ul>
	Tab options:<br>
	<ul>
		<li><code>
				setMnemonicAt(1, KeyEvent.VK_2);<span
					style="font-family: georgia, sans-serif;"></span>
			</code></li>
	</ul>
	<ul>
		<li><code>pane.indexOfTabComponent(3)</code></li>
		<li><code>pane.remove(3)</code></li>
	</ul>
	<br> <br>
	<table width="85%" bgcolor="#ccccff" border="1" cellpadding="4"
		cellspacing="0">
		<tbody>
			<tr>
				<th colspan="4"><u>Component Events and Listeners</u></th>
			</tr>
			<tr>
				<th valign="bottom">JComponent</th>
				<th valign="bottom">User Interaction that Generates an Event</th>
				<th valign="bottom">Event Object<br> Created
				</th>
				<th valign="bottom">Listener <u>Interface</u> the Event Handler
					Should Implement<br> <i>method(s) needed</i></th>
			</tr>
			<tr>
				<td><span class="Coding">JTextField</span></td>
				<td rowspan="2">Pressing <span class="Coding">&lt;Enter&gt;</span></td>
				<td rowspan="3" align="center"><span class="Coding">ActionEvent</span></td>
				<td rowspan="3" align="center"><span class="Coding"><u>ActionListener</u><br>
						<i>actionPerformed</i></span></td>
			</tr>
			<tr>
				<td><span class="Coding">JTextArea</span></td>
			</tr>
			<tr>
				<td><span class="Coding">JButton</span></td>
				<td>Pressing the button</td>
			</tr>
			<tr>
				<td><span class="Coding">JRadioButton</span></td>
				<td>Selecting a radio button</td>
				<td rowspan="3" align="center"><span class="Coding">ItemEvent</span></td>
				<td rowspan="3" align="center"><span class="Coding"><u>ItemListener</u><br>
						<i>itemStateChanged</i></span></td>
			</tr>
			<tr>
				<td><span class="Coding">JCheckBox</span></td>
				<td>(De)selecting a checkbox</td>
			</tr>
			<tr>
				<td><span class="Coding">JComboBox</span></td>
				<td rowspan="2">Selecting an item</td>
			</tr>
			<tr>
				<td><span class="Coding">JList</span></td>
				<td align="center"><span class="Coding">ListSelectionEvent</span></td>
				<td align="center"><span class="Coding"><u>ListSelectionListener</u><br>
						<i>valueChanged</i></span></td>
			</tr>
			<tr>
				<td rowspan="2">Any component</td>
				<td>Pressing/releasing mouse buttons</td>
				<td rowspan="2" align="center"><span class="Coding">MouseEvent</span></td>
				<td align="center"><span class="Coding"><u>MouseListener</u><br>
						<i>mousePressed<br> mouseReleased<br> mouseClicked<br>
							mouseEntered<br> mouseExited
					</i></span></td>
			</tr>
			<tr>
				<td>Moving/dragging mouse</td>
				<td align="center"><span class="Coding"><u>MouseMotionListener</u><br>
						<i>mouseDragged<br> mouseMoved
					</i></span></td>
			</tr>
		</tbody>
	</table>
	<br> <br>
	<h2>Helper Classes</h2>
	<p>
		The helper classes, such as <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">Graphics
		</span></span>, <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">Color
		</span></span>, <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">Font
		</span></span>, <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">FontMetrics
		</span></span>, <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">Dimension
		</span></span>, and <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">LayoutManager
		</span></span>, are not subclasses of <span><span
			style="font-family: 'Andale Mono', 'Courier New', Courier, monospace; color: rgb(0, 153, 204); font-size: x-small;">Component
		</span></span>. They are used to describe the properties of GUI components, such as
		graphics context, colors, fonts, and <span id="IL_AD12" class="IL_AD">dimension</span>.<br>
	</p>
	<h1>
		<br>
	</h1>
	<h2>NOTE</h2>
	<ul>
		<li>JComponent not added during construction must call the
			container's <code class="code">validate()</code> method in order to
			force a re-layout of the components (and thus the display of the new
			JComponent)
		</li>
		<li>call <code>dispone()</code> method to close a window<br>
		</li>
	</ul>
	<br>
	<h1>Swing Event Model</h1>
	<h2>Note</h2>
	<ul>
		<li>A listener receives a fired event and acts on that event</li>
		<li>Listeners, source (of an event) and handlers can be separated</li>
		<li>As a programmer, we create a listener object and register it
			(<code>addXXXListener()</code>)with the componet that' firing the
			event
		</li>
		<li><code>addXXListener</code> VS <code>removeXXXListener()</code></li>
	</ul>
	<br>
</article>

<?php include $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>
